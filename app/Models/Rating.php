<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
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
        'rate_number',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'ratings';

    /*
	 * belongs to table
     */
    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    /*
	 * belongs to companies table
     */
    public function companies()
    {
    	return $this->belongsTo(Company::class);
    }

    /*
     * belongs to worker profiles table
     */
    public function worker_profiles()
    {
        return $this->belongsTo(WorkerProfile::class);
    }
}
