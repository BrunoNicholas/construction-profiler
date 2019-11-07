<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Models\TeamUser;
use App\Models\Company;
use App\Models\Project;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Image;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'date_of_birth',
        'role', 'profile_image', 'gender', 'telephone', 
        'nationality', 'occupation', 'place_of_work', 'work_address', 
        'home_address', 'bio', 'status', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * The relationship method for projects.
     *
     * as projects.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * The relationship method for team users.
     *
     * as that.
     */
    public function team_users()
    {
        return $this->hasMany(TeamUser::class);
    }
}
