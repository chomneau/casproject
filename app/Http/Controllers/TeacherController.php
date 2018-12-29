<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Teacher;
use App\Admin;
use Session;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth:admin');
    }




    //show all teacher

    public function show(){

    	$teacher = Teacher::orderBy('first_name', 'ASC')->get();
    	return view('admin.teacher.all_teacher')->with('teacher', $teacher);
    }

	// show register form for teacher
    public function register(){
    	return view('admin.teacher.register_teacher');
    }


	public function validation($request){

        return $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'skill' => 'required|string',
            'phone' => 'required|string|min:9',

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


    }

    public function store(Request $request, $id){

    	

        $this->validation($request);
        $admin = Admin::find($id);

        $teacher = new Teacher;
        $teacher->photo = 'uploads/photo/1510817755img.png';
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->skill = $request->skill;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request['password']);
        $teacher->admin_id = $admin->id;
        $teacher->save();
        
		Session::flash('success', 'You have successfully created a new teacher!');
        return redirect()->route('teacher.showAll', $admin->id);

        
    }

    //get update form

    public function edit($admin_id, $teacher_id){

    	$admin = Admin::findOrFail($admin_id);
    	$teacher = Teacher::findOrFail($teacher_id);

    	return view('admin.teacher.edit_teacher')->with(['teacher'=>$teacher, 'admin'=>$admin]);
    }


	public function validUpdate($request){

        return $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'skill' => 'required|string',
            'phone' => 'required|string|min:9',
			
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);


    }

    //update tearcher

    public function update(Request $request, $admin_id, $teacher_id){

    	
        $this->validUpdate($request);
        $admin = Admin::find($admin_id);

        $teacher = Teacher::findOrFail($teacher_id);

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->skill = $request->skill;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        
        $teacher->admin_id = $admin->id;
        $teacher->save();

        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . $photo->getClientOriginalName();
            $photo->move('uploads/photo', $photo_new_name);
            $teacher->photo = 'uploads/photo/' . $photo_new_name;
            $teacher->save();
        }


        if($request->has('password')){
        	$teacher->password = bcrypt($request['password']);
        	$teacher->save();
        }

        
		Session::flash('success', 'You have successfully update teacher\'s profile!');
        return redirect()->route('teacher.showAll', $admin->id);


        
    }

    public function delete($admin_id, $teacher_id){

    	$teacher = Teacher::findOrFail($teacher_id);
    	$admin = Admin::findOrFail($admin_id);
    	$teacher->delete();

    	Session::flash('success', 'You have successfully deleted teacher\'s profile!');
        return redirect()->route('teacher.showAll', $admin->id);

    }


    



}
