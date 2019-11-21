<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Review;
use App\Models\Rating;

class WorkerProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'profile_name',
        'profile_category',
        'profile_description',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'worker_profiles';

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
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /*
     * Has many relationship to table
     */
    public function reviews()
    {
        $this->hasMany(Review::class);
    }

    /*
     * Has many relationship to table
     */
    public function ratings()
    {
        $this->hasMany(Rating::class);
    }
}
