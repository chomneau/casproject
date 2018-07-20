<?php

namespace App\Http\Controllers;

use App\EmployeeNumber;
use Illuminate\Http\Request;
use Session;

class EmployeeSizeController extends Controller
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
        $employeeSize = EmployeeNumber::all();
       //return $employeeSize;
         return view('admin.employee_number.index')->with('employeeSize', $employeeSize);
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

        $employeeSize = new EmployeeNumber();
        $employeeSize->name = $request->name;
        $employeeSize->admin_id = auth()->user()->id;
        $employeeSize->save();

        Session::flash('success', 'You successfully added a new employee size');
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
        $employeeSize = EmployeeNumber::find($id);
        return view('admin.employee_number.editEmployeeSize')->with('employeeSize', $employeeSize);
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

        $employeeSize = EmployeeNumber::find($id);
        $employeeSize->name = $request->name;
        $employeeSize->admin_id = auth()->user()->id;
        $employeeSize->save();

        Session::flash('success', 'You successfully added a new employee size');
        return redirect('admin/employeeSize');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeSize = EmployeeNumber::find($id);
        $employeeSize->delete();
        Session::flash('success', 'You successfully deleted industry type');
        return redirect()->back();
    }
}
