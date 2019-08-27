<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Teacher;
use App\Admin;
use Session;
use Illuminate\Support\Facades\Hash;
use App\GradeProfile;
use View;
use App\Assignment;
use App\Lessonplan;
use App\AbsentTeacher;
use App\GradeFile;

class TeacherController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth:admin');

        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);
    }




    //show all teacher

    public function show(){

        $teacher = Teacher::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
        
        $teacherCountMale = Teacher::where('gender', 'Male')->count();
        $teacherCountFemale = Teacher::where('gender', 'Female')->count();
        $teacherCount = Teacher::all()->count();

    	return view('admin.teacher.all_teacher')->with([
            'teacher'=> $teacher,
            'teacherCount'  =>  $teacherCount,
            'teacherCountMale'  =>  $teacherCountMale,
            'teacherCountFemale'  =>  $teacherCountFemale,
            ]);
    }

    //teacher profile in admin side
    public function teacherProfile($admin_id, $teacher_id)
    {
        $admin = Admin::findOrFail($admin_id);
        $assignment = Assignment::where('teacher_id', $teacher_id)->get();
        $gradefile = GradeFile::where('teacher_id', $teacher_id)->get();
        $lesson = Lessonplan::where('teacher_id', $teacher_id)->get();
        $teacher = Teacher::find($teacher_id);
        $absentTeacher = AbsentTeacher::where('teacher_id', $teacher_id)->OrderBy('created_at', 'decs')->get();
        return view('admin.teacher.profile')->with([
            'teacher'=>$teacher, 
            'admin'=>$admin,
            'assignments'=>$assignment,
            'gradefile'=>$gradefile,
            'lesson'=>$lesson,
            'absentTeacher'=>$absentTeacher
            ]);
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
            'position' => 'required|string',
            'phone' => 'required|string|min:9',

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


    }

    public function store(Request $request, $id){

        $this->validation($request);
        $admin = Admin::find($id);

        $teacher = new Teacher;
        $teacher->grade_profile_id = $request->homeRoomTeacher;
        $teacher->photo = 'uploads/photo/1510817755img.png';
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->position = $request->position;
        $teacher->degree = $request->degree;
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
            'position' => 'required|string',
            'phone' => 'required|string|min:9',
			
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);


    }

    //update tearcher

    public function update(Request $request, $admin_id, $teacher_id){

    	
        $this->validUpdate($request);
        $admin = Admin::find($admin_id);

        $teacher = Teacher::findOrFail($teacher_id);

        $teacher->grade_profile_id = $request->homeRoomTeacher;

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->position = $request->position;
        $teacher->degree = $request->degree;
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
//search teacher
public function searchTeacher(){
    $teacher = Teacher::where('first_name','like', '%'. request('query') .  '%')
        ->orWhere('last_name','like', '%'. request('query') .  '%')
        ->orWhere('email','like', '%'. request('query') .  '%')
        ->orWhere('phone','like', '%'. request('query') .  '%')
        ->paginate(10);
    return view('admin.teacher.search-teacher')->with('teacher', $teacher)
        ->with('teacherName', 'Search results :' .request('query'));
}

 

    



}
