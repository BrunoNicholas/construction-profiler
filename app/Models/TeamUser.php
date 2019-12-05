<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\User;

class TeamUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'user_id',
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
    public function teams()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
