<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lead $lead)
    {
        return inertia('Tasks/Index', ['lead'=>$lead,'tasks'=>$lead->tasks()->with('lead')->paginate(10)]);

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
        $lead->tasks()->save(Task::make($validated));
        return redirect()->route('leads.tasks.index',$lead)->with('success','Task was saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead,Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead,Task $task)
    {
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
        //
    }
}
