<?php

namespace App;

//use App\Mail\ProjectCreated;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    protected $guarded = []; 
    // by setting up guarded property to an empty array,
    // allows us to use create method with specified felds without need to update them like with fillable property
    // however make sure that you won't grab all request data when processing data from requests
    //protected $fillable = ['title', 'description']; defining fields in form that way ensures only those can be
    // updated with the request as a result fillable needs to be updated every time you will decide to change the form.

    //we are overriding parents boot method and insert our model hook that fires at project creation event
    //we need to make sore to bring in parent boot methot first  then we use created helper method to hook into event
    //since we use Mail facade we need to import it at the top and import ProjectCreated MailableClass path.
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($project) {
    //         Mail::to($project->owner->email)->send(
    //             new ProjectCreated($project)
    //         );
    //     });
    // }
    // we are moving this logic to event listener now :)

    //There is third method to map built in Eloquent created event to event we want to triger at creation of our project
    //by doing so

    // protected $dispatchesEvents = [
    //     'created' => ProjectCreated::class
    // ];

    // now there is no need to fire custom event in the controller and all the logic will be hidden witch will 
    // make it harder to debug

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function addTask($task)
    {
        //taking advantage of relationship defined above with eloquent
        //current project id is applied automatically by laravel as it knows what project id is currently loaded
        //thanks to relationship rule
        $this->tasks()->create($task);

        //explicit way of doing things
        // return Task::create([
        //         'project_id' => $this->id,
        //         'description' => $description
        //     ]);
    }
    public function clearTasks()
    {
        $this->tasks()->delete();
    }
}
