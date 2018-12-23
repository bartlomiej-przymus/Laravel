<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //unused import we just leave it here for now
use App\Project; // << we pull in project model we created so we donthave to reference it by full path

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // query the model for data notice we use project now instead /App/Project
        //return view('projects.index', ['projects' => $project]); //passing variable to our view 2 ways same result
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store()
    {
        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        
        return redirect('/projects');
    }
}
