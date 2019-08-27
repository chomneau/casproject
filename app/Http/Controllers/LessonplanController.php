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
use App\Lessonplan;

use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LessonplanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');

        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);
    }



    public function showLessonplan($teacher_id){

       

        $teacher = Teacher::findOrFail($teacher_id);

        $lesson = Lessonplan::where('teacher_id', $teacher_id)->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.teacher.lesson_plan.index')
            ->with(['lesson'=> $lesson, 'teacher'=>$teacher]);
    }

    public function createLessonplanForm ($teacher_id){
        $teacher = Teacher::findOrFail($teacher_id);
        return view('admin.teacher.lesson_plan.upload_lesson_plan_form')->with('teacher', $teacher);
    }

    public function createLessonplan(Request $request, $teacher_id){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'gradeProfile'=>'required',
            'file_name'=>'sometimes|max:10000'

        ]);

        $teacher = Teacher::find($teacher_id);
        $lesson = new Lessonplan;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->grade_profile_id = $request->gradeProfile;
        $lesson->file_name = $request->file_name;
        $lesson->teacher_id = $teacher->id;


        if ($request->hasFile('file_name')) {
            $file_name = $request->file_name;
            $upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
            $file_name->move('uploads/lesson_plan', $upload_new_name);
            $lesson->file_name = $upload_new_name;
           // $assignment->save();
        }
        $lesson->save();

        Session::flash('success', 'You have uploaded lesson plan file successfully!');
        return redirect()->route('teacher.lessonPlan.show', ['teacher_id'=>$teacher->id]);
    }

    public function LessonplanDetail($teacher_id, $lessonplan_id){
        $teacher = Teacher::find($teacher_id);
        $lesson = Lessonplan::find($lessonplan_id);

        return view('admin.teacher.lesson_plan.show_detail')
                    ->with(['lesson'=>$lesson, 'teacher'=>$teacher]);
    }

    public function LessonplanEdit($teacher_id, $lessonplan_id){
        $teacher = Teacher::find($teacher_id);
        $lesson = Lessonplan::find($lessonplan_id);

        return view('admin.teacher.lesson_plan.edit_lesson_plan')
            ->with(['lesson'=>$lesson, 'teacher'=>$teacher]);
    }
    public function LessonplanUpdate(Request $request,$teacher_id, $lessonplan_id){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'gradeProfile'=>'required',
            'file_name'=>'sometimes|max:10000',

        ]);

        $teacher = Teacher::find($teacher_id);
        $lesson = Lessonplan::find($lessonplan_id);



        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->grade_profile_id = $request->gradeProfile;
       // $lesson->file_name = $request->file_name;
        $lesson->teacher_id = $teacher->id;
       // $assignment->save();



        if ($request->hasFile('file_name')) {
            $file_name = $request->file_name;
            $upload_new_name = date('gi') . "_" . $file_name->getClientOriginalName();
            $file_name->move('uploads/lesson_plan', $upload_new_name);
            $lesson->file_name = $upload_new_name;
            // $assignment->save();
        }
          //  $lesson->file_name = $lesson->file_name;

        $lesson->save();

        Session::flash('success', 'You have update an lesson plan');
        return redirect()->route('teacher.lessonPlan.show', ['teacher_id'=>$teacher->id]);

    }

    public function LessonplanDelete($lessonplan_id){
       // $teacher = Teacher::find($teacher_id);
        $lesson = Lessonplan::find($lessonplan_id);

       // $delete = storage::delete('public/uploads/lesson_plan'.$lesson->file_name);

        $lesson->delete();

        Session::flash('success', 'You have just deleted an lesson plan');
        return redirect()->back();
    }
}
