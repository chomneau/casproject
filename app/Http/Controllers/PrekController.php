<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentProfile;

class PrekController extends Controller
{

    public function viewScorePrek($grade_id, $student_id){
        $score = Score::where([
            ['student_profile_id', $student_id],
            ['grade_id', $grade_id],
        ])->get();
        $gradeId = Grade::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);
        
        return view('admin.student.high_school.index_school')
            ->with([
                'grade_id'=>$gradeId,
                'scores'=>$score,
                'students'=>$student,
            ]);
            Session::flash('backUrl', Request::fullUrl());
    }

    //query subjects
    public function SubjectByGrade($grade_id, $student_id){
        $subject = Subject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        return view('admin.student.high_school.add_subject_tograde')
           ->with([
               'subjects'=>$subject,
               'students'=>$student,
               'grade_id'=>$grade
           ]);
    }



}
