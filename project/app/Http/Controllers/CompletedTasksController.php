<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class CompletedTasksController extends Controller
{
    protected $guarded = [];
    public function store(Task $task)
    {
        $task->complete();
        return back();
    }
    public function destroy(Task $task)
    {
        $task->incomplete();
        return back();
    }
}
