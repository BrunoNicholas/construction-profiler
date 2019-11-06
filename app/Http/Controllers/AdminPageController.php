<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Question;
use App\Models\Role;
use App\User;

class AdminPageController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
	    $users 	= User::latest()->paginate(5);
		$roles 	= Role::latest()->paginate(5);
	    $questions      = Question::latest()->paginate(20);
	    $departments    = Department::latest()->paginate(5);

	    return view('admin.index', compact(['users','roles','departments','questions']));
	}
}
