<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Question;
use App\Models\Company;
use App\Models\Project;
use App\User;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'question_id',
        'user_id',
        'comment',
        'company_id',
        'project_id',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'comments';

    /**
     * Belonds to relationship connects both
     * the comment to e parent post, question, sermon 
     * or deveotional
     *
     */

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to e parent post, sermon 
     *
     */
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to e parent post, sermon 
     *
     */
    public function companies()
    {
        return $this->belongsTo(Company::class);
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
