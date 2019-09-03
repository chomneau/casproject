<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Admin;
use App\Staff;
use App\StaffAbsent;

class StaffController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function showStaff(){
    	$staff = Staff::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
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
            //'email' => 'required|string|email',
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
			$admin = Admin::find(Auth::user()->id);
			$staffAsent = StaffAbsent::where('staff_id', $id)->OrderBy('created_at', 'decs')->get();
    	return view('admin.staff.staff_detail')->with([
				'staff' => $staff,
				'admin' => $admin,
				'staffAsent' => $staffAsent,

			]);
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
		
		//staff absent

		public function storeStaffAbsent(Request $request, $admin_id, $staff_id)
		{
			$this->validate($request, [
				'absent_type' => 'required',
				'number_day' => 'required',
				'from' => 'required',
				'to' => 'required',
				'reason' => 'required',

			]);

			$staffAbsent = new StaffAbsent();
			$staffAbsent->absent_type = $request->absent_type;
			$staffAbsent->number_day = $request->number_day;
			$staffAbsent->from = $request->from;
			$staffAbsent->to = $request->to;
			$staffAbsent->reason = $request->reason;
			$staffAbsent->staff_id = $staff_id;

			$staffAbsent->save();

			Session::flash('success', 'You have successfully add a new absent');
			return redirect()->back();
		}

		//Staff Absent Edit

		public function editStaffAbsent($staffAbsent_id, $admin_id, $staff_id)
		{
			$admin = Admin::findOrFail($admin_id);
			$staff = Staff::findOrFail($staff_id);
			$staffAbsent = StaffAbsent::findOrFail($staffAbsent_id);

			
			return view('admin.staff.edit-staff-absent')->with([

				'admin'         =>  $admin,
        'staff'       	=>  $staff,
        'staffAbsent' 	=>  $staffAbsent

				]);
		}
// staff Absnet Edit
		public function updateStaffAbsent(Request $request ,$staffAbsent_id, $admin_id, $staff_id)
    {
        
        $admin = Admin::findOrFail($admin_id);
        $staff = Staff::find($staff_id);

        $staffAbsent = StaffAbsent::findOrFail($staffAbsent_id);
    
        $staffAbsent->absent_type = $request->absenttype;
        $staffAbsent->number_day = $request->numberday;
        $staffAbsent->from = $request->from;
        $staffAbsent->to = $request->to;
        $staffAbsent->reason = $request->reason;
        $staffAbsent->save();

        Session::flash('success', 'You have updated record sucessfully');
        return redirect('admin/staffDetail/'.$staff->id);
       

		}
		
//Staff Absent Delete

public function deleteStaffAbsent($id)
{
	$staffAbsentDelete = StaffAbsent::findOrFail($id);
	$staffAbsentDelete->delete();
	Session::flash('success', 'You have delete a record sucessfully');
	return redirect()->back();

}

//search staff
public function searchStaff(){
	$staff = Staff::where('first_name','like', '%'. request('query') .  '%')
			->orWhere('last_name','like', '%'. request('query') .  '%')
			->orWhere('email','like', '%'. request('query') .  '%')
			->orWhere('phone','like', '%'. request('query') .  '%')
			->paginate(10);
	return view('admin.staff.search-staff')->with('staff', $staff)
			->with('staffName', 'Search results :' .request('query'));
}


    



}
