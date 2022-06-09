<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('pages.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.add-comp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:width=100,height=100',
        ]);

        // Handle file upload
        if($request->hasFile('logo')){
            // get filename with extension
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just extension 
            $extension = $request->file('logo')->getClientOriginalExtension();

            // filenameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
        }

        $company = new Company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        $company->logo = $fileNameToStore;

        $company->save();

        return redirect('/company')->with('success', 'Company Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('pages.company.edit-comp')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Handle file upload
        if($request->hasFile('logo')){
            // get filename with extension
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just extension 
            $extension = $request->file('logo')->getClientOriginalExtension();

            // filenameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
        }
        else{
            $fileNameToStore = Company::find($id)->logo;
        }

        // Create
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        $company->logo = $fileNameToStore;

        $company->save();

        return redirect('/company')->with('success', 'Company Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect('/company')->with('success', 'Company Deleted');
    }
}
