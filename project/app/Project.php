<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = []; //by setting up guarded property to an empty array,
    // allows us to use create method with specified felds without need to update them like with fillable property
    // however make sure that you wont grab all request data when processing data from request
    //protected $fillable = ['title', 'description']; defining fields in form that way ensures only those can be updated with the request.
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
