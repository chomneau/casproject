<?php

namespace App\Http\Controllers;

use App\CompanyType;
use Illuminate\Http\Request;
use Session;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $companyType = CompanyType::all();
        return view('admin.company_type.index')->with('companyType', $companyType);
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
        $this->validate($request, [
            'name'=>'required'
        ]);

        $companyType = new CompanyType();
        $companyType->name = $request->name;
        $companyType->admin_id = auth()->user()->id;
        $companyType->save();

        Session::flash('success', 'You have successfully added a new company type');
        return redirect()->back();
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
        $companyType = CompanyType::find($id);
        return view('admin.company_type.editCompanyType')->with('companyType', $companyType);
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
        $this->validate($request, [
            'name'=>'required'
        ]);

        $companyType = CompanyType::find($id);
        $companyType->name = $request->name;
        $companyType->admin_id = auth()->user()->id;
        $companyType->save();

        Session::flash('success', 'You have successfully updated a company type');
        return redirect('admin/companyType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companyType = CompanyType::find($id);
        $companyType->delete();
        Session::flash('success', 'You have successfully deleted a company type');
        return redirect()->back();

    }
}
