<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkerProfile;

class Project extends Model
{
    //

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function worker_profiles()
    {
        return $this->belongsTo(WorkerProfile::class);
    }
}
