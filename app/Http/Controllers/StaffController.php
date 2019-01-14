<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Admin;
use App\Staff;

class StaffController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function showStaff(){
    	$staff = Staff::all();
    	return view('admin.staff.show_staff')->with('staff', $staff);
    }

    public function createStaff(){

    	return view('admin.staff.create_staff_form');

    }


	public function validation($request){

        return $this->validate($request, [
            
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'position' => 'required|string',
            'degree' => 'required|string',
            'phone' => 'required|string|min:9',
            'email' => 'required|string|email',
        ]);


    }


    public function storeStaff(Request $request, $id){
			
			$this->validation($request);

        	$admin = Admin::find($id);

        	$staff = new Staff;
        	$staff->admin_id = $admin->id;
        	$staff->photo = 'uploads/photo/1510817755img.png';
        	$staff->first_name = $request->first_name;
        	$staff->last_name = $request->last_name;
        	$staff->gender = $request->gender;
        	$staff->position = $request->position;
        	$staff->degree = $request->degree;
        	$staff->phone = $request->phone;
        	$staff->email = $request->email;
        	$staff->date_of_birth = $request->date_of_birth;

        	$staff->save();

        	Session::flash('success', 'You have successfully created a new staff!');

        	return redirect()->route('admin.showStaff');



    }

    public function staffDetail($id){

    	$staff = Staff::find($id);
    	return view('admin.staff.staff_detail')->with('staff',$staff);
    }

    public function staffEdit($id){
    	$staff = Staff::find($id);

    	return view('admin.staff.staff_edit')->with('staff',$staff);
    }

    public function staffUpdate(Request $request, $id){

    		$this->validation($request);

    		$staff = Staff::find($id);
    		$admin = Admin::find(Auth::user()->id);

    		if ($request->hasFile('photo')) {
	            $photo = $request->photo;
	            $photo_new_name = time() . $photo->getClientOriginalName();
	            $photo->move('uploads/avatar', $photo_new_name);
	            $staff->photo = 'uploads/avatar/' . $photo_new_name;
	            $staff->save();
        	}

    		$staff->admin_id = $admin->id;
        	
        	$staff->first_name = $request->first_name;
        	$staff->last_name = $request->last_name;
        	$staff->gender = $request->gender;
        	$staff->position = $request->position;
        	$staff->degree = $request->degree;
        	$staff->phone = $request->phone;
        	$staff->email = $request->email;
        	$staff->date_of_birth = $request->date_of_birth;

        	$staff->save();

        	Session::flash('success', 'You have successfully created a new staff!');

        	return redirect()->route('admin.showStaff');
    }

    public function staffDelete($id){
    	$staff = Staff::find($id);
    	$staff->delete();

		Session::flash('success', 'You have successfully deleted!');

        return redirect()->back();

    }



}
