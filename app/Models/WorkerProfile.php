<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class WorkerProfile extends Model
{
    //

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
