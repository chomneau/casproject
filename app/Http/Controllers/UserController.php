<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
     public function __construct()
        {
            $this->middleware('auth');
        }

    public function index()
    {
        return view('user.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input from user for correct format
        $this->validate($request, [
            'first_Name' => 'required|max:255',
            'last_Name' => 'required|max:255',
            'sex' => 'required',
            'email' => 'required|max:255',
            'date_of_birth' => 'required|max:255',
            'phone' => 'required',
            'location' => 'required',
            'about_me' => 'required',
        ]);

        $userprofile = new UserProfile();

        $userprofile->first_name = $request->input('first_Name');
        $userprofile->last_name = $request->input('last_Name');
        $userprofile->sex = $request->input('sex');
        $userprofile->DateOfBirth = $request->input('date_of_birth');
        $userprofile->email = $request->input('email');
        $userprofile->phone = $request->input('date_of_birth');
        $userprofile->address = $request->input('phone');
        $userprofile->location = $request->input('location');
        $userprofile->bio = $request->input('about_me');
        $userprofile->user_id = auth()->user()->id;

        $userprofile->save();

        return redirect('user.profile')->with('success', 'your profile is updated!');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
