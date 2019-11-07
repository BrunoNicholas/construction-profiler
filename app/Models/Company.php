<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Comment;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_name',
        'company_email',
        'company_logo',
        'company_telephone',
        'company_location',
        'company_description',
        'company_bio',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'companies';

    /*
	 * belongs to table
     */

    public function users()
    {
    	$this->belongsTo(User::class);
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

    /*
	 * Has many relationship to table
     */
    public function comments()
    {
    	$this->hasMany(Comment::class);
    }
}
