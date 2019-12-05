<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TeamUser;
use App\Models\Project;
use App\User;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_name',
        'user_id',
        'project_id',
        'team_description',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'teams';

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * The relationship method for comments.
     *
     * as comments.
     */
    public function team_users()
    {
        return $this->hasMany(TeamUser::class);
    }
}
