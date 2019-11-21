<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\User;
use Image;
use File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(20);
        return view('system.companies.index',compact(['companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::latest()->paginate(20);
        return view('system.companies.create',compact(['companies']));
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
        'company_name'  => 'required|unique:companies',
        'company_email' => 'required|unique:companies',
        'user_id'       => 'required',
        'status'        => 'required',
        ]);
        Company::create($request->all());

        if ($request->hasFile('company_logo')) {
            $project_image = $request->file('company_logo');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(340, 340)->save( public_path('/files/companies/images/' . $filename) );
            
            $company = Company::where('name',$request->name)->get()->first();
            $company->company_logo = $filename;
            $company->save();
        }

        $user = User::find($request->user_id);
        $user->role = 'company-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','company-admin')->first());

        $company = Company::where('company_email',$request->company_email)->first();

        return redirect()->route('companies.show',$company->id)->with('success','Company profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return back()->with('danger','Company not found. It\'s missing or deleted.');
        }
        return view('system.companies.show',compact(['company']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return back()->with('danger','Company not found. It\'s missing or deleted.');
        }
        return view('system.companies.edit',compact(['company']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
        'company_name'  => 'required',
        'company_email' => 'required',
        'user_id'       => 'required',
        'status'        => 'required',
        ]);
        
        $company        = Company::find($id);
        $company->company_name      = $request->company_name;
        $company->company_email      = $request->company_email;
        $company->user_id      = $request->user_id;
        $company->company_telephone      = $request->company_telephone;
        $company->company_location      = $request->company_location;
        $company->company_description      = $request->company_description;
        $company->company_bio      = $request->company_bio;
        $company->status      = $request->status;
        $company->save();


        if ($request->hasFile('company_logo')) {

            $pathToImage = public_path('files/companies/images/').$company->company_logo;
            File::delete($pathToImage);

            $project_image = $request->file('company_logo');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(340, 340)->save( public_path('/files/companies/images/' . $filename) );
            
            $company = Company::where('id',$id)->get()->first();
            $company->company_logo = $filename;
            $company->save();
        }

        $user = User::find($request->user_id);
        $user->role = 'company-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','company-admin')->first());

        $company = Company::where('company_email',$request->company_email)->first();

        return redirect()->route('companies.show',$company->id)->with('success','Company profile created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Company::find($id);

        $user = User::find($item->user_id);
        $user->role = 'subscriber';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','subscriber')->first());

        $pathToImage = public_path('files/companies/images/').$item->company_logo;
        File::delete($pathToImage);

        $item->delete();
        
        return redirect()->route('companies.index')->with('danger', 'Company deleted successfully');
    }
}
