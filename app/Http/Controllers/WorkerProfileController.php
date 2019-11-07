<?php

namespace App\Http\Controllers;

use App\Models\WorkerProfile;
use Illuminate\Http\Request;

class WorkerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = WorkerProfile::latest()->paginate(20);
        return view('system.profiles.index',compact(['profiles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = WorkerProfile::latest()->paginate(20);
        return view('system.profiles.create',compact(['profiles']));
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
            'profile_name'  => 'required',
            'user_id'       => ['required', 'unique:worker_profiles'],
            'status'        => 'required',
        ]);
        WorkerProfile::create($request->all());
        return route('workprofiles.index')->with('success','Your worker profile has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkerProfile  $workerProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = WorkerProfile::find($id);
        if (!$profile) {
            return back()->with('danger','Worker profile not found. It\'s either missing or deleted.' );
        }
        return view('system.profiles.show',compact(['profile']))
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerProfile  $workerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = WorkerProfile::find($id);
        if (!$profile) {
            return back()->with('danger','Worker profile not found. It\'s either missing or deleted.' );
        }
        return view('system.profiles.edit',compact(['profile']))
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkerProfile  $workerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerProfile  $workerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = WorkerProfile::find($id);
        $item->delete();
        return redirect()->route('workprofiles.index')->with('danger', 'Worker profile deleted successfully');
    }
}
