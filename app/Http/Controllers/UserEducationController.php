<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEducation;
use Session;

class UserEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
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
            'school_name' => 'required|max:255',
            'study_field' => 'required|max:255',
            'degree' => 'required',
            'location' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
        ]);

//        $user = Auth::user();
        $education = new UserEducation();
        $education->school_name = $request->school_name;
        $education->study_field = $request->study_field;
        $education->degree = $request->degree;
        $education->location = $request->location;
        $education->start_month = $request->start_month;
        $education->start_year = $request->start_year;
        $education->end_month = $request->end_month;
        $education->end_year = $request->end_year;
        $education->description = $request->description;
        $education->user_id = auth()->user()->id;

        //$user->Experience->save();
        $education->save();
        Session::flash('success', 'You successfully added new education to your cv!');

        return redirect('mycv')->with('education', $education);
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
        $education = UserEducation::find($id);
        return view('user.education.edit-education')->with('education', $education);
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
            'school_name' => 'required|max:255',
            'study_field' => 'required|max:255',
            'degree' => 'required',
            'location' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',

        ]);

//      $user = Auth::user();
        $education = UserEducation::find($id);
        $education->school_name = $request->school_name;
        $education->study_field = $request->study_field;
        $education->degree = $request->degree;
        $education->location = $request->location;
        $education->start_month = $request->start_month;
        $education->start_year = $request->start_year;
        $education->end_month = $request->end_month;
        $education->end_year = $request->end_year;
        $education->description = $request->description;
        $education->user_id = auth()->user()->id;

        //$user->Experience->save();
        $education->save();
        Session::flash('success', 'You successfully updated your education!');

        return redirect('mycv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = UserEducation::find($id);
        $education->delete();
        Session::flash('success', 'You successfully deleted your education!');
        return redirect('mycv');
    }
}
