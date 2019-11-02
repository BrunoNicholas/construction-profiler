<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Question;
use App\Models\Role;
use App\User;

class AdminPageController extends Controller
{
    $users 	= User::latest()->paginate(5);
	$roles 	= Role::latest()->paginate(5);
    $questions      = Question::all();
    $departments    = Department::all();
    return view('admin.index', compact(['users','roles','departments','questions','donations','volunteers']));
}
