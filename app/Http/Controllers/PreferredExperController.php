<?php

namespace App\Http\Controllers;

use App\PreferredExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PreferredExperController extends Controller
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
        $preExperience = PreferredExperience::all();
        return view('admin.preferred_experience.index')->with('preExperience', $preExperience);
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
          'name'=> 'required'
       ]);

        $preExperience = new PreferredExperience();
        $preExperience->name = $request->name;
        $preExperience->admin_id = auth()->user()->id;
        $preExperience->save();

        Session::flash('success', 'You have added a preferred experience!');
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
        $preExperience = PreferredExperience::find($id);
        return view('admin.preferred_experience.editPreferredExperience')
            ->with('preExperience', $preExperience);
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
            'name'=> 'required'
        ]);

        $preExperience = PreferredExperience::find($id);
        $preExperience->name = $request->name;
        $preExperience->admin_id = auth()->user()->id;
        $preExperience->save();

        Session::flash('success', 'You have successfully updated a preferred experience!');
        return redirect('admin/preExperience');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preExperience = PreferredExperience::find($id);
        $preExperience->delete();
        Session::flash('success', 'You have successfully deleted a preferred experience!');
        return redirect('admin/preExperience');
    }
}
