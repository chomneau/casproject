<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;

use App\CompanyType;
use App\Company;
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
use Illuminate\Http\Request;
use Session;
use Auth;
use View;
class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::with('industryType')->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
       return view('admin.company.view-all-company')->with('company', $company);
//    $industry = IndustryType::with('company')->orderBy('created_at', 'desc')
//            ->take(10)
//            ->get();
//        return view('admin.company.view-all-company')->with('industry', $industry);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create-company');
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
            //validate for company table
            'companyName' => 'required',
            'contactPerson' => 'required',
            'employeeSize' => 'required',
            'companyType' => 'required',
            'industryType' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'location' => 'required',
            'website' => 'required|url',
            'address' => 'required'
        ]);

        //$user = Auth::user();
        $company = new Company();
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
        return redirect('admin/company');


   //$com = Company::all();
//        $va = 5;
//        $la = 4;
//        return $va + $la;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('admin.company.company-profile')
            ->with([
                'company'=>$company,
                'note'=>$company->note,
                'jobPost'=>$company->job,

            ]);
     //  return view('admin.company.company-profile')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.edit-company')->with('company', $company);
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
        return redirect()->route('admin.company.profile', ['id'=>$company->id]);
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
