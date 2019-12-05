<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkerProfile;
use App\Models\Company;
use App\User;

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
	 * belongs to companies table
     */
    public function worker_profiles()
    {
    	return $this->belongsTo(WorkerProfile::class);
    }
}
