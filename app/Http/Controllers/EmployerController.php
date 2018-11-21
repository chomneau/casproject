<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Category;

use App\CompanyType;
use App\ContractType;
use App\Degree;
use App\EmployeeNumber;
use App\IndustryType;
use App\Job;
use App\Level;
use App\Location;
use App\Note;
use App\PreferredExperience;
use App\SalaryRange;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;

use View;
//use Illuminate\Support\Facades\Input as input;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer');
        

//        $this->company = Company::all();
//        View::share('company', $this->company);



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $company = Company::find($user_id);
        return view('employer.employer-profile')
            ->with([
                'company'=>$company,
                'note'=>$company->note,
                'jobPost'=>$company->job,
            ]);
        //  return view('admin.company.company-profile')->with('company', $company);
    }





        //return view('admin.company.company-profile');
       // return view('employer.employer-home')->with('employer', Auth::user());
//        $company = Company::with('industryType')->orderBy('created_at', 'desc')
//            ->take(10)
//            ->get();
//        return view('admin.company.view-all-company')->with('company', $company);


    public function employeeAllJobs(){
        $user_id = Auth::user();
        $jobPost = Job::find($user_id);
        return view('employer.employer-all-jobs')->with('jobPost', $jobPost);

    }


    //show edit employer form
    public function edit($id)
    {
        $company = Company::find($id);
        return view('employer.employer-edit-profile')->with('company', $company);
    }


    //update employer
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //validate for company table
            'companyName' => 'required',
            'contactPerson' => 'required',
            'employeeSize' => 'required',
            'companyType' => 'required',
            'industryType' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'location' => 'required',
            //'website' => 'required|url',
            'address' => 'required'
        ]);

        //$user = Auth::user();
        $company = Company::find($id);
        //upload image for user

        $company->companyName = $request->companyName;
        $company->contactPerson = $request->contactPerson;
        $company->employeeSize_id = $request->employeeSize;
        $company->companyType_id = $request->companyType;
        $company->industry_type_id = $request->industryType;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->location_id = $request->location;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->about = $request->about;
        $company->user_id = auth::user()->id;
        $company->save();

        if($request->hasFile('logo'))
        {
            $logo = $request->logo;
            $logo_new_name = time().$logo->getClientOriginalName();
            $logo->move('uploads/logos', $logo_new_name);
            $company->logo = 'uploads/logos/'.$logo_new_name;
            $company->save();
        }

        Session::flash('success', 'You successfully updated your profile');
        return redirect()->route('employer.profile', ['id'=>$company->id]);
    }

    //show password form
    public function showPassForm($id){
        $employer = Employer::find($id);
        $company = Company::find($id);
        return view('employer.form.show-password-form')
            ->with('employerPassword', $employer)
            ->with('company', $company);
    }

    //update password for employer
    public function updatePassword( Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $employer = Employer::findOrFail(Auth::user()->id);


        if (Hash::check(Input::get('oldPassword'), $employer['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $employer->password = bcrypt(Input::get('password'));
            $employer->save();

            Session::flash('success', 'Password changed successfully!');
            return redirect('/employer');
        } else {
            Session::flash('error', 'Your current password not match! Try Again');
            return redirect()->back();
        }
    }
            /*
            * Validate all input fields
            */

//
//        if (Hash::check($request->password, $employer->password)) {
//            $employer->fill([
//                'password' => Hash::make($request->newPassword)
//            ])->save();
//
//            $request->session()->flash('success', 'Password changed');
//            return redirect()->route('employer.profile');
//
//        } else {
//            $request->session()->flash('error', 'Password does not match');
//            return redirect()->route('employer.profile');
//        }


//    public function validation($request){
//        return $this->validate($request, [
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//    }





}
