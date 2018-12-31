<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //unused import we just leave it here for now
use App\Project; // << we pull in project model we created so we donthave to reference it by full path
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['store', 'update', 'create']);
    }
    public function index()
    {
        // auth() helper function
        //auth()->id() returns id of currently logged in user if user is a guest it returns null [integer]
        //auth()->user() returns instance of user currently signed in [object]
        //auth()->check() checks if the user is currently signed in [boolean]
        //auth()->guest() checks if current user is guest [boolean]
        //if (auth()->guest()) {then do following}

        //refactoring to:
        $projects = auth()->user()->projects;
        
        //old entry before refactoring
        //$projects = Project::where('owner_id', auth()->id())->get(); // eloquent query for database: select * from projects where owner_id = 4
        
        //$projects = Project::all(); query the model for data notice we use project now instead /App/Project
        //return view('projects.index', ['projects' => $projects]); //passing variable to our view 2 ways same result
        //dump($projects);
        
        return view('projects.index', compact('projects'));

        //another way to write  both lines together would be
        // return view('projects.index', [
        //    'projects => auth()->user()->projects'
        //]);
    }
    public function show(Project $project)
    {
        //gate facade aproach
        //\Gate::allows
        //\Gate::denies
        //if(/Gate::denies('update', $project)) {
        //    abort(403);
        //}
        //abort_unless(/Gate::allows('update', $project), 403)

        //auth with policies set up
        $this->authorize('view', $project);

        //authentification methods without policies

        //object oriented aproach
        //abort_unless(auth()->user()->owns($project), 403);
        //abort_if(! auth()->user()-owns($project), 403); then you will have to create owns method in your user class

        //helper function with conditional way
        //abort_if($project->owner_id !== auth()->id()-, 403); laravel helper function 

        //regular if statement
        // if($project->owner_id !== auth()->id()) { abort(403);}

        
        
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
            // two ways to add owner_id to this form
        //append to array saying
        $attributes['owner_id'] = auth()->id();
        //or say Project::create($attributes + ['owner_id' => auth()->id()]);
        // OR WE CAN USE ELOQUENT RELATIONSHIPS
        // check how to do this !!!!!!!!!
        $project = Project::create($attributes);

        // Mail::to('bartlomiej.przymus@gmail.com')->send(  
        //     new ProjectCreated($project)
        // );
        //above example was hardcoded now lets do this proper way

        Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    public function update(Project $project)
    {
        //call to new method to make code more DRY
        //$project->update(request(['title', 'description']));

        $project->update($this->validateProject());
        return redirect('/projects');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
    protected function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);
    }
}
