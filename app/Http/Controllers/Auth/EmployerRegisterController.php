<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class EmployerRegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/employer';

    public function __construct()
    {
        $this->middleware('guest');
    }



    public function showEmployerRegisterForm()
    {
        return view('employer.employer-register');

    }


//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//    }

//    protected function employerRegister(array $data)
//    {
//        $employer = Employer::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
////        Profile::create([
////            'user_id' => $user->id,
////        ]);
//
////        Experience::create([
////            'user_id' => $user->id,
////        ]);
//        return $employer;
//
//    }

    public function employerRegister(Request $request){
        $this->validation($request);
        $employer = Employer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        Company::create([
            'user_id' => $employer->id,
            'companyName'=>$employer->name,
        ]);
        return redirect('/employer')->with('success', 'You have registered');
    }

    public function validation($request){
        return $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


    }



}
