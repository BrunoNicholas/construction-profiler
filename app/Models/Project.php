<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkerProfile;
use App\Models\Comment;
use App\Models\Team;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'department',
        'description_image',
        'estimated_period',
        'start_date',
        'end_date',
        'description',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'projects';

    /*
     * belongs to table
     */

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

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
