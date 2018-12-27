<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    // public function update(Task $task)
    // {
    //    Another approach is to conditionaly determine which of the new methods to call basing on the value of
    // request (long form)
    // if (request()->has('completed')) {
    //     $task->complete();
    // } else {
    //     $task->incomplete();
    // }

    //same as above but shorter
    //request()->has('completed') ? $task->complete() : $task->incomplete();

    //last option is to set the method

    // $method = request()->has('completed') ? 'complete' : 'incomplete';

    // $task->method();

    //    In this approach we call to new mwthod on task model let it deal with database
    //   operations we just passing the values along
    //    $task->complete(request()->has('completed'));

    //    In this approach we taking care of everything we are grabbing
    // request calling method setting property we micromanage
    //    $task->update([
    //     'completed' => request()->has('completed')
    //    ]);

    //    return back();
    // }

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
