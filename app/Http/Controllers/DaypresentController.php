<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DayPresent;
use Illuminate\Support\Facades\Auth;
use Session;

class DaypresentController extends Controller
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
        $daypresent = DayPresent::all();
        return view('admin.Absent.day_present.index')->with('daypresent', $daypresent);
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
            'quarter_name' => 'required',
            'quarter_day_present' => 'required',
            
        ]);

        $daypresent = new DayPresent();
        $daypresent->quarter_name = $request->quarter_name;
        $daypresent->quarter_day_present = $request->quarter_day_present;
        $daypresent->save();

        Session::flash('success', 'You successfully added new quarter!');
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
        $daypresent = daypresent::find($id);
        return view('admin.Absent.day_present.edit_daypresent')
            ->with('daypresent', $daypresent);
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
           // 'quarter_name' => 'required',
            'quarter_day_present' => 'required',
            
        ]);

        $daypresent = DayPresent::find($id);
       // $daypresent->quarter_name = $request->quarter_name;
        $daypresent->quarter_day_present = $request->quarter_day_present;
        $daypresent->save();

        Session::flash('success', 'Update successfully!');
        return redirect('admin/daypresent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daypresent = DayPresent::find($id);
        $daypresent->delete();
        Session::flash('success', 'Deleted successfully!');
        return redirect()->back();
    }
}
