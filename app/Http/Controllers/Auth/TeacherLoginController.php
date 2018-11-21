<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Teacher;
use App\User;

class TeacherLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:teacher', ['except'=>['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.login_admin_teacher');
    }
    public function teacherLogin(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //attempt to login the user in
        if(Auth::guard('teacher')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
            //if successful, then redirect to their intended location

           // return redirect()->intended(route('teacher.profile'));
             return redirect()->intended(route('teacher.profile'));
        }
        //if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    
    public function logout(){
        Auth::guard('teacher')->logout();
        return redirect('/teacher/login');
    }

}
