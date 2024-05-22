<?php

namespace App\Observers;

use App\Models\Task;
use App\Notifications\TaskCreated;
use Illuminate\Support\Facades\Cache;

class TaskObserver
{
    private function clearCache(){
        Cache::tags('tasks')->flush();
    }
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        $this->clearCache();
        Cache::tags('tasks')->put('task:'.$task->id,$task);
        $task->load(['lead']);
        $task->lead->notify(new TaskCreated($task));
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        $this->clearCache();
        Cache::tags('tasks')->put('task:'.$task->id,$task);
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        $this->clearCache();
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
