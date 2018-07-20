<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Job;
use Session;
use View;
use Illuminate\Support\Facades\Auth;

use App\Category;

use App\CompanyType;

use App\ContractType;
use App\Degree;
use App\EmployeeNumber;
use App\IndustryType;
use App\Level;
use App\Location;
use App\Note;
use App\PreferredExperience;
use App\SalaryRange;


class EmployerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

          //  $this->middleware('auth:admin');
            $this->middleware('auth:employer');

        $this->category = Category::all();
        View::share('category', $this->category);

        $this->industryType = IndustryType::all();
        View::share('industryType', $this->industryType);

        $this->location = Location::all();
        View::share('location', $this->location);

        $this->companyType = companyType::all();
        View::share('companyType', $this->companyType);

        $this->employeeSize = EmployeeNumber::all();
        View::share('employeeSize', $this->employeeSize);

        $this->contractType = ContractType::all();
        View::share('contractType', $this->contractType);

        $this->salaryRange = SalaryRange::orderBy('name', 'Asc')->get();
        View::share('salaryRange', $this->salaryRange);

        $this->level = Level::all();
        View::share('level', $this->level);

        $this->degree = Degree::all();
        View::share('degree', $this->degree);

        $this->preExperience = PreferredExperience::all();
        View::share('preExperience', $this->preExperience);

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
    public function create(Request $request)
    {
        $company = Company::find($request->id);
        $job = Job::all();
        return view('employer.job.create-job')->with(['job' => $job, 'company'=>$company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [

        //validate for job table
            'jobTitle' => 'required',
            'jobDescription' => 'required',
            'jobRequirement' => 'required',
            'jobContract' => 'required',
            'jobCategory' => 'required',
            'jobSalary' => 'required',
            'jobLocation' => 'required',
            'jobHiring' => 'required',
            'jobDeadLine' => 'required',
        //validate for preferred candidate
             'level' => 'required',
             'degree' => 'required',
             'experience' => 'required',
             'language' => 'required',

        ]);

       // $user = Auth::user();
        $company = Company::find($id);
        $job = new Job();
        $job->jobTitle = $request->jobTitle;
        $job->jobDescription = $request->jobDescription;
        $job->jobRequirement = $request->jobRequirement;
        $job->contractType_id = $request->jobContract;
        $job->category_id = $request->jobCategory;
        $job->salaryRange_id = $request->jobSalary;
        $job->location_id = $request->jobLocation;
        $job->hire = $request->jobHiring;
        $job->deadLine = $request->jobDeadLine;
        $job->level_id = $request->level;
        $job->degree_id = $request->degree;
        $job->job_experience_id = $request->experience;
        $job->language = $request->language;
        $job->company_id = $company->id;
        $job->save();

        Session::flash('success', 'You have created a new job successfully!');
        return redirect()->route('employer.dashboard', ['id'=>$company->id]);


 //       return 123;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show()
   {
       //
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $company_id)
    {
        $job = Job::find($id);
        $company = Company::find($company_id);
        return view('employer.job.edit-job')->with(['job'=>$job, 'company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $company_id)
    {
        $this->validate($request, [

            //validate for job table
            'jobTitle' => 'required',
            'jobDescription' => 'required',
            'jobRequirement' => 'required',
            'jobContract' => 'required',
            'jobCategory' => 'required',
            'jobSalary' => 'required',
            'jobLocation' => 'required',
            'jobHiring' => 'required',
            'jobDeadLine' => 'required',
            //validate for preferred candidate
            'level' => 'required',
            'degree' => 'required',
            'experience' => 'required',
            'language' => 'required',

        ]);

        // $user = Auth::user();
        $company = Company::find($company_id);
        $job = Job::find($id);
        $job->jobTitle = $request->jobTitle;
        $job->jobDescription = $request->jobDescription;
        $job->jobRequirement = $request->jobRequirement;
        $job->contractType_id = $request->jobContract;
        $job->category_id = $request->jobCategory;
        $job->salaryRange_id = $request->jobSalary;
        $job->location_id = $request->jobLocation;
        $job->hire = $request->jobHiring;
        $job->deadLine = $request->jobDeadLine;
        $job->level_id = $request->level;
        $job->degree_id = $request->degree;
        $job->job_experience_id = $request->experience;
        $job->language = $request->language;
        $job->company_id = $company->id;
        $job->save();

        Session::flash('success', 'You have updated a job successfully!');
        return redirect()->route('employer.dashboard', ['id'=>$company->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        Session::flash('success', 'You have deleted a job successfully!');
        return redirect()->back();
    }
}
