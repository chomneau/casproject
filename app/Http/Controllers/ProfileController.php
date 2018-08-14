<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profile;
use App\Location;
use Auth;
use View;
use Session;



class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        // $this->location = Location::all();
        // View::share('location', $this->location);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'sex' => 'required',
            //'email' => 'required|email',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'student_id' => 'required',
            'nationality' => 'required',
            'progressive_book_id' => 'required',
            'parents_name' => 'required',
            'career' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);

        $user = Auth::admin();
        //upload image for user
        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . $photo->getClientOriginalName();
            $photo->move('uploads/avatar', $photo_new_name);
            $user->profile->photo = 'uploads/photo/' . $photo_new_name;
            $user->profile->save();
        }


        $user->email = $request->email;
        $user->name = $request->firstName;

        $user->profile->first_name = $request->firstName;
        $user->profile->last_name = $request->lastName;
        $user->profile->sex = $request->sex;
        $user->profile->date_of_birth = $request->date_of_birth;
        $user->profile->phone = $request->phone;
        $user->profile->address = $request->address;
        $user->profile->nationality = $request->nationality;
        $user->profile->location_id = $request->location;
        $user->profile->position = $request->position;
        $user->profile->expected_salary = $request->expected_salary;
        $user->profile->experience = $request->experience;
       // $user->profile->bio = $request->bio;
        $user->profile->user_id = auth()->user()->id;

        //upload cv and cover letter

        $uploadCV = new Uploadcv;
        if ($request->hasFile('cv')) {
            $upload = $request->cv;
            $upload_new_name = date('gi') . "_" . $upload->getClientOriginalName();
            //  $fileSize = File::size($upload);
            $upload->move('uploads/cv', $upload_new_name);
            $uploadCV->name = $upload_new_name;
            // $uploadCV->fileSize = $fileSize;
            $uploadCV->user_id = Auth::user()->id;
            $uploadCV->save();
        }


        $user->save();
        $user->profile->save();

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        Session::flash('success', 'You successfully updated your profile');

        return redirect('/admin');

          //  return 12345;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function uploadCvFunction(Request $request)
    // {
    //     $this->validate($request, [
    //         'upload' => 'required'
    //         //'upload' => 'required|mimes:pdf,doc,docx|size:5000'
    //     ]);
    //     $uploadCV = new Uploadcv;
    //     if ($request->hasFile('cv')) {
    //         $upload = $request->upload;
    //         $upload_new_name = date('gi') . "_" . $upload->getClientOriginalName();
    //         //  $fileSize = File::size($upload);
    //         $upload->move('uploads/cv', $upload_new_name);
    //         $uploadCV->name = $upload_new_name;
    //         // $uploadCV->fileSize = $fileSize;
    //         $uploadCV->user_id = Auth::user()->id;
    //         $uploadCV->save();
    //         Session::flash('success', 'You have upload your file successfully!');
    //     } else {
    //         Session::flash('success', 'You can not upload this file');
    //     }

    //     return redirect()->back();
    // }



}
