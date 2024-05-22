<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lead $lead)
    {
        $tasks = Cache::tags('tasks')->rememberForever(
            'tasks:' . $lead->id . '_page_' . request('page', 1),
            function () use ($lead) {
                return $lead->tasks()->with('lead')->paginate(10);
            }
        );

        return inertia('Tasks/Index', ['lead'=>$lead,'tasks'=>$tasks]);
    }

    public function allTasks()
    {
        $tasks = Cache::tags('tasks')->rememberForever('tasks:page'.request('page_',1),function (){
            return Task::with('lead')->paginate(10);
        });

        return inertia('Tasks/Index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lead $lead)
    {
        return inertia('Tasks/Create', ['lead'=>$lead]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Lead $lead,TaskRequest $request)
    {
        $validated = $request->validated();
        $lead->tasks()->create($validated);
        return redirect()->route('leads.tasks.index',$lead)->with('success','Task was saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead, $task)
    {
        $task = Cache::tags('tasks')->rememberForever(
            'task:' . $task,
            function () use ($task) {
                return Task::findOrFail($task);
            }
        );

        return inertia('Tasks/Show', ['lead'=>$lead,'task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead,$task)
    {
        $task = Cache::tags('tasks')->rememberForever('task:'.$task,function () use ($task){
            return Task::findOrFail($task);
        });
        return inertia('Tasks/Edit', ['lead'=>$lead,'task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Lead $lead,TaskRequest $request, Task $task)
    {
        $validated = $request->validated();
        $task->update($validated);
        return redirect()->route('leads.tasks.index',$lead)->with('success','Task was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead,Task $task)
    {
        $task->delete();
        return redirect()->route('leads.tasks.index',$lead)->with('success','Task was deleted!');

    }
}
