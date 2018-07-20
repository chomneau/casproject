<?php

namespace App\Http\Controllers;

use App\Experience;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;


class CvController extends Controller
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('user.cv.index')->with(['experience'=>$user->experience, 'education'=>$user->education]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.cv.create-cv');
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
            'position' => 'required|max:255',
            'employer_name' => 'required|max:255',
            'contract_type' => 'required',
            'industry_type' => 'required',
            'start_month' => 'required',
            'start_year' => 'required|max:4',
            'end_month' => 'required',
            'end_year' => 'required|max:4',
            'location' => 'required'

        ]);

//        $user = Auth::user();
        $experience = new Experience();
        $experience->job_position = $request->position;
        $experience->company_name = $request->employer_name;
        $experience->contract_type = $request->contract_type;
        $experience->industry_type = $request->industry_type;
        $experience->start_month = $request->start_month;
        $experience->start_year = $request->start_year;
        $experience->end_month = $request->end_month;
        $experience->end_year = $request->end_year;
        $experience->location = $request->location;
        $experience->description = $request->description;
        $experience->user_id = auth()->user()->id;

        //$user->Experience->save();
        $experience->save();
        Session::flash('success', 'You successfully added one experience!');

        return redirect('mycv');
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
        $experience = Experience::find($id);
        return view('user.cv.edit-cv')->with('experience', $experience);
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
            'position' => 'required|max:255',
            'employer_name' => 'required|max:255',
            'contract_type' => 'required',
            'industry_type' => 'required',
            'start_month' => 'required',
            'start_year' => 'required|max:4',
            'end_month' => 'required',
            'end_year' => 'required|max:4',
            'location' => 'required'

        ]);

//        $user = Auth::user();
        $experience = Experience::find($id);
        $experience->job_position = $request->position;
        $experience->company_name = $request->employer_name;
        $experience->contract_type = $request->contract_type;
        $experience->industry_type = $request->industry_type;
        $experience->start_month = $request->start_month;
        $experience->start_year = $request->start_year;
        $experience->end_month = $request->end_month;
        $experience->end_year = $request->end_year;
        $experience->location = $request->location;
        $experience->description = $request->description;
        $experience->user_id = auth()->user()->id;

        //$user->Experience->save();
        $experience->save();
        Session::flash('success', 'You successfully updated experience!');

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
        $experience = Experience::find($id);
        $experience->delete();

        Session::flash('success', 'You successfully deleted experience!');
        return redirect('mycv');
    }
}
