<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\User;
use App\Grade;
use App\KLevel;
use App\Score;
use App\SecondaryLevel;
use App\Subject;
use App\Assignment;
use Image;
use Storage;

use App\StudentProfile;

use View;
use App\AbsentRecord;
use App\Absent;
use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\PrekScore;
use App\SecondaryScore;
use App\KSubject;
use App\PrimarySubject;
use Illuminate\Support\Facades\Validator;






class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');

//        $this->grade = Grade::all();
//        View::share('grade', $this->grade);
//
//        $this->kgrade = KLevel::all();
//        View::share('kgrade', $this->kgrade);
//
//
//        $this->secondaryGrade = SecondaryLevel::all();
//        View::share('secondaryGrade', $this->secondaryGrade);
//
//        $this->subject = Subject::all();
//        View::share('subject', $this->subject);
//
//        // $this->absent = Absent::all();
//        // View::share('absent', $this->absent);
//
//        $this->absentRecord = AbsentRecord::all();
//        View::share('absentRecord', $this->absentRecord);
//
//        $this->gradeProfile = GradeProfile::all();
//        View::share('gradeProfile', $this->gradeProfile);

        // $this->teacher = Teacher::find(Auth()->user());
        // View::share('teacher', $this->teacher);

        $this->gradeProfile = GradeProfile::all();
        View::share('gradeProfile', $this->gradeProfile);
    }



    public function showAssignment($teacher_id){

        $teacher = Teacher::findOrFail($teacher_id);

        $assignment = Assignment::where('teacher_id', $teacher_id)->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.assignment.show_assignment')
            ->with(['assignment'=> $assignment, 'teacher'=>$teacher]);
    }

    public function createAssignmentForm ($teacher_id){
        $teacher = Teacher::findOrFail($teacher_id);
        return view('admin.assignment.create_assignment_form')->with('teacher', $teacher);
    }

    public function createAssignment(Request $request, $teacher_id){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'gradeProfile'=>'required',
            'file_name'=>'sometimes|max:10000'

        ]);

        $teacher = Teacher::find($teacher_id);
        $assignment = new Assignment;
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->grade_profile_id = $request->gradeProfile;
        $assignment->file_name = $request->file_name;
        $assignment->teacher_id = $teacher->id;


        if ($request->hasFile('file_name')) {
            $file_name = $request->file_name;
            $upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
            $file_name->move('uploads/assignment_file', $upload_new_name);
            $assignment->file_name = $upload_new_name;
           // $assignment->save();
        }
        $assignment->save();

        Session::flash('success', 'You have uploaded assignment file successfully!');
        return redirect()->route('teacher.assignment.show', ['teacher_id'=>$teacher->id]);
    }

    public function assignmentDetail($teacher_id, $assignment_id){
        $teacher = Teacher::find($teacher_id);
        $assignment = Assignment::find($assignment_id);

        return view('admin.assignment.show_detail')
                    ->with(['assignments'=>$assignment, 'teacher'=>$teacher]);
    }

    public function assignmentEdit($teacher_id, $assignment_id){
        $teacher = Teacher::find($teacher_id);
        $assignment = Assignment::find($assignment_id);

        return view('admin.assignment.edit_assignment')
            ->with(['assignments'=>$assignment, 'teacher'=>$teacher]);
    }
    public function assignmentUpdate(Request $request,$teacher_id, $assignment_id){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'gradeProfile'=>'required',
            'file_name'=>'sometimes|max:10000',

        ]);

        $teacher = Teacher::find($teacher_id);
        $assignment = Assignment::find($assignment_id);



        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->grade_profile_id = $request->gradeProfile;
        $assignment->file_name = $request->file_name;
        $assignment->teacher_id = $teacher->id;
       // $assignment->save();



        if ($request->hasFile('file_name')) {
            $file_name = $request->file_name;
            $upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
            $file_name->move('uploads/assignment_file', $upload_new_name);
            $assignment->file_name = $upload_new_name;
            // $assignment->save();
        }
            $assignment->file_name = $assignment->file_name;

        $assignment->save();

        Session::flash('success', 'You have update an assignment');
        return redirect()->route('teacher.assignment.show', ['teacher_id'=>$teacher->id]);

    }

    public function assignmentDelete($assignment_id){
       // $teacher = Teacher::find($teacher_id);
        $assignment = Assignment::find($assignment_id);

        $assignment->delete();

        Session::flash('success', 'You have just deleted an assignment');
        return redirect()->back();
    }
//
//if ($request->hasFile('file_name')) {
//$file_name = $request->file_name;
//$upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
//    // $location = public_path('uploads/assignment_file'.$upload_new_name);
//    // Image::make($file_name)->resize(800, 400)->save($location);
//$oldFilename = $assignment->file_name;
//
//    // $file_name->move('uploads/assignment_file', $upload_new_name);
//$assignment->file_name = $upload_new_name;
//Storage::delete($oldFilename);
//    // $assignment->save();








}
