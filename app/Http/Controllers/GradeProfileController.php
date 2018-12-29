<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradeProfile;
use Session;

class GradeProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$gradeProfile = GradeProfile::all();
    	return view('admin.grade.gradeProfile.index')
    	->with('gradeProfile', $gradeProfile);
    }

    //store
    public function store(Request $request){

    	$this->validate($request, [
            'grade' => 'required',
        ]);

        $gradeProfile = new gradeProfile;

        $gradeProfile->name = $request->grade;

        $gradeProfile->save();

        Session::flash('success', 'You successfully added new Grade!');
        return redirect()->back();

    	
    }

//edit gradeprofile
    public function edit($id){
    	$gradeprofile = GradeProfile::find($id);
    	return view('admin.grade.gradeProfile.grade_profile_edit')
    	->with('gradeprofile', $gradeprofile);
    }

//update 

	public function update(Request $request, $id){

		$this->validate($request, [
            'grade' => 'required',
        ]);

		$gradeprofile = GradeProfile::find($id);
		$gradeprofile->name = $request->grade;
        $gradeprofile->save();

        Session::flash('success', 'You successfully updated a Grade!');
        return redirect('admin/gradeprofile');
	}

	//delete

	public function delete($id){
		$gradeprofile = GradeProfile::find($id);
		$gradeprofile->delete();

		Session::flash('success', 'You successfully deleted gradeprofile!');
		return redirect()->back();
	}






}
