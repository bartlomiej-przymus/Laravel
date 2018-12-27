<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
       $task->update([
        'completed' => request()->has('completed')
       ]);

       return back();
    }

    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);
        // storing post request to database calling all properties that need to be stored and submitting them
        
        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);

        //taking advantage of project model and defining new method addTask makes it more readable
        $project->addTask($attributes);

        return back();
    }
    public function destroy(Project $project)
    {
        //implementing clearing of tasks
        $project->clearTasks();

        return back();
    }
}
