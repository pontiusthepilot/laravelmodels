<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // $fillable = [..] permits mass assignment to be performed by any controller that references the Project model.
    // The opposite of this is $guarded = [..]. The contents of $guarded = [..] cannot be mass assigned.
    protected $fillable = [
        'owner_id',
    	'title',
    	'description',
    ];

    public function tasks()
    {
      return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}

