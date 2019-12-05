<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\WorkerProfile;
use App\Models\Company;
use App\User;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($type == 'company') {
            $company = Company::find($id);
            $ratings   = $company->ratings;
            return view('system.ratings.index',compact(['ratings','type','id']));
        }
        elseif ($type == 'profile') {
            $profile = WorkerProfile::find($id);
            $comments   = $profile->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        elseif ($type == 'company') {
            $company = Company::find($id);
            $comments   = $company->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        elseif ($type == 'project') {
            $project = Project::find($id);
            $comments   = $project->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        $comments = Comment::all();
        return view('system.comments.index',compact(['comments','type','id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_id'       => 'required',
            'rate_number'   => 'required',
        ]);
        Rating::create($request->all());

        return back()->with('success','Thanks for rating successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'user_id'       => 'required',
            'rate_number'   => 'required',
        ]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Rating::find($id);
        $item->delete();
        return back()->with('danger', 'Rating deleted successfully!');
    }
}
