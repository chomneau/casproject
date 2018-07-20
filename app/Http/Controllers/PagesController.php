<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getAbout()
    {
        return view('pages.about');
    }
    //about page setting

    public function aboutSetting(){
        return view('admin.pageSetting.aboutSetting');
    }



    public function getContact()
    {
        return view('pages.contact');
    }
    public function getFindJob()
    {
        return view('pages.findjob');
    }
    public function form()
    {
        return view('pages.form');
    }

}
