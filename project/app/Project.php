<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = []; //by setting up guarded property to an empty array,
    // allows us to use create method with specified felds without need to update them like with fillable property
    // however make sure that you won't grab all request data when processing data from requests
    //protected $fillable = ['title', 'description']; defining fields in form that way ensures only those can be
    // updated with the request as a result fillable needs to be updated every time you will decide to change the form.
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
