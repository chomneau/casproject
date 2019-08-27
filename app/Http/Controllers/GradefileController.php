<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\User;

use Image;
use Storage;

use App\StudentProfile;

use View;
use App\GradeFile;

use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GradefileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');

        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);
    }



    public function showGradefile($teacher_id){

       

        $teacher = Teacher::findOrFail($teacher_id);

        $gradefiles = GradeFile::where('teacher_id', $teacher_id)->orderBy('created_at', 'desc')
            ->get();

        return view('admin.teacher.grade_file_upload.index')
            ->with(['gradefiles'=> $gradefiles, 'teacher'=>$teacher]);
    }

    public function createGradefileForm ($teacher_id){
        $teacher = Teacher::findOrFail($teacher_id);
        return view('admin.teacher.grade_file_upload.upload_gradefile_form')->with('teacher', $teacher);
    }

    public function createGradefile(Request $request, $teacher_id){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'gradeProfile'=>'required',
            'file_name'=>'sometimes|max:10000'

        ]);

        $teacher = Teacher::find($teacher_id);
        $lesson = new GradeFile;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->grade_profile_id = $request->gradeProfile;
        $lesson->file_name = $request->file_name;
        $lesson->teacher_id = $teacher->id;


        if ($request->hasFile('file_name')) {
            $file_name = $request->file_name;
            $upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
            $file_name->move('uploads/gradefile', $upload_new_name);
            $lesson->file_name = $upload_new_name;
           // $assignment->save();
        }
        $lesson->save();

        Session::flash('success', 'You have uploaded lesson plan file successfully!');
        return redirect()->route('teacher.gradefile.show', ['teacher_id'=>$teacher->id]);
    }

    public function GradefileDetail($teacher_id, $gradefile_id){
        $teacher = Teacher::find($teacher_id);
        $lesson = GradeFile::find($gradefile_id);

        return view('admin.teacher.grade_file_upload.show_detail')
                    ->with(['lesson'=>$lesson, 'teacher'=>$teacher]);
    }

    public function GradefileEdit($teacher_id, $gradefile_id){
        $teacher = Teacher::find($teacher_id);
        $gradefile = GradeFile::find($gradefile_id);

        return view('admin.teacher.grade_file_upload.edit_gradefile')
            ->with(['gradefile'=>$gradefile, 'teacher'=>$teacher]);
    }

    public function gradefileUpdate(Request $request, $teacher_id, $gradefile_id){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'gradeProfile'=>'required',
            'file_name'=>'sometimes|max:10000',
        ]);

        $teacher = Teacher::find($teacher_id);
        $gradefile = GradeFile::find($gradefile_id);

        $gradefile->title = $request->title;
        $gradefile->description = $request->description;
        $gradefile->grade_profile_id = $request->gradeProfile;
       // $lesson->file_name = $request->file_name;
        $gradefile->teacher_id = $teacher->id;
       // $assignment->save();

        if ($request->hasFile('file_name')) {
            $file_name = $request->file_name;
            $upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
            $file_name->move('uploads/gradefile', $upload_new_name);
            $gradefile->file_name = $upload_new_name;
            
        }
          

        $gradefile->save();

        Session::flash('success', 'You have update an lesson plan');
        return redirect()->route('teacher.gradefile.show', ['teacher_id'=>$teacher->id]);

    }

    public function GradefileDelete($gradefile_id){
       // $teacher = Teacher::find($teacher_id);
        $lesson = GradeFile::find($gradefile_id);

       // $delete = storage::delete('public/uploads/lesson_plan'.$lesson->file_name);

        $lesson->delete();

        Session::flash('success', 'You have just deleted an lesson plan');
        return redirect()->back();
    }
}
