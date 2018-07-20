<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use App\Profile;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use App\Location;
use View;
use App\StudentProfile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->location = Location::all();
        // View::share('location', $this->location);
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user_CV = User::find($user_id);
        


         return view('/home')->with(['user'=>Auth::user(), 'uploadCv'=>$user_CV->uploadcv]);
    }

}
