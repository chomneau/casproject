<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;
use Session;

class DegreeController extends Controller
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
        $degree = Degree::all();
        return view('admin.preferred_degree.index')->with('degree', $degree);
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
            'name' => 'required'
        ]);
        $degree = new Degree();
        $degree->name = $request->name;
        $degree->admin_id = auth()->user()->id;
        $degree->save();
        Session::flash('success', 'You have added a new preferred degree successfully!');
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
        $degree = Degree::find($id);
        return view('admin.preferred_degree.editDegree')->with('degree', $degree);
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
            'name' => 'required'
        ]);
        $degree = Degree::find($id);
        $degree->name = $request->name;
        $degree->admin_id = auth()->user()->id;
        $degree->save();
        Session::flash('success', 'You have updated a preferred degree successfully!');
        return redirect('admin/degree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $degree = Degree::find($id);
        $degree->delete();
        Session::flash('success', 'You have deleted a preferred degree successfully!');
        return redirect('admin/degree');

    }
}
