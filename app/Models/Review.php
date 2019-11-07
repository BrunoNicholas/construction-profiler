<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'worker_profile_id',
        'review_message',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'reviews';

    /*
	 * belongs to table
     */
    public function users()
    {
    	$this->belongsTo(User::class);
    }

    /*
	 * belongs to companies table
     */
    public function companies()
    {
    	$this->belongsTo(Company::class);
    }

    /*
	 * belongs to companies table
     */
    public function worker_profiles()
    {
    	$this->belongsTo(WorkerProfile::class);
    }
}
