<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(20);
        return view('system.teams.index',compact(['teams']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::latest()->paginate(20);
        return view('system.teams.create',compact(['teams']));
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
            'project_id'  => 'required',
            'user_id'       => 'required',
            'status'        => 'required',
        ]);

        Team::create($request->all());

        return route('teams.index')->with('success','Team saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return back()->with('danger','Team not found. It\'s either missing or deleted.');
        }
        return view('system.teams.show',compact(['team']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return back()->with('danger','Team not found. It\'s either missing or deleted.');
        }
        return view('system.teams.edit',compact(['team']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Team::find($id);
        $item->delete();
        return redirect()->route('teams.index')->with('danger', 'Team deleted successfully!');
    }
}
