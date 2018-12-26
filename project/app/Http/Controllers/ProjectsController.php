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
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);
        Project::create($attributes);
        return redirect('/projects');
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    public function update(Project $project)
    {
        $project->update(request(['title', 'description']));
        return redirect('/projects');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
