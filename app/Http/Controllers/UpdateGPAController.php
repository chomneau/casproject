<?php

namespace App\Http\Controllers;
use App\Grade;
use App\KLevel;
use App\Score;
use App\SecondaryLevel;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StudentProfile;
use App\User;
use Session;
use View;
use App\AbsentRecord;
use App\Absent;
use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Teacher;
use App\DayPresent;

class UpdateGPAController extends Controller
{
    public function updateGPA(Request $request, $grade_id, $student_id)
    {
                
        $grade = Grade::find($grade_id);
        $studentprofile = StudentProfile::find($student_id);

        $scores = Score::where(['grade_id' => $grade_id, 'student_profile_id' => $student_id])->get();

        
        foreach($scores as $score){
            


        $GPA_1 = ($score->quarter_1 + $score->quarter_2)/2;


        if ($GPA_1 >= 92.5 && $GPA_1 <= 100) {
            $score->gpa_quarter_1 = "A";
            $score->pts_1 = ($score->subject->credit*4)/2;
        } elseif ($GPA_1 >= 89.5 && $GPA_1 <= 92) {
            $score->gpa_quarter_1 = "A-";
            $score->pts_1 = ($score->subject->credit*3.70)/2;
        } elseif ($GPA_1 >= 86.5 && $GPA_1 <= 89) {
            $score->gpa_quarter_1 = "B+";
            $score->pts_1 = ($score->subject->credit*3.30)/2;
        } elseif ($GPA_1 >= 82.5 && $GPA_1 <= 86) {
            $score->gpa_quarter_1 = "B";
            $score->pts_1 = ($score->subject->credit*3.00)/2;
        } elseif ($GPA_1 >= 79.5 && $GPA_1 <= 82) {
            $score->gpa_quarter_1 = "B-";
            $score->pts_1 = ($score->subject->credit*2.70)/2;
        } elseif ($GPA_1 >= 76.5 && $GPA_1 <= 79) {
            $score->gpa_quarter_1 = "C+";
            $score->pts_1 = ($score->subject->credit*2.30)/2;
        } elseif ($GPA_1 >= 72.5 && $GPA_1 <= 76) {
            $score->gpa_quarter_1 = "C";
            $score->pts_1 = ($score->subject->credit*2.00)/2;
        } elseif ($GPA_1 >= 69.5 && $GPA_1 <= 72) {
            $score->gpa_quarter_1 = "C-";
            $score->pts_1 = ($score->subject->credit*1.70)/2;
        } elseif ($GPA_1 >= 66.5 && $GPA_1 <= 69) {
            $score->gpa_quarter_1 = "D+";
            $score->pts_1 = ($score->subject->credit*1.30)/2;
        } elseif ($GPA_1 >= 62.5 && $GPA_1 <= 66) {
            $score->gpa_quarter_1 = "D";
            $score->pts_1 = ($score->subject->credit*1.00)/2;
        } elseif ($GPA_1 >= 59.5 && $GPA_1 <= 62) {
            $score->gpa_quarter_1 = "D-";
            $score->pts_1 = ($score->subject->credit*0.70)/2;
        } elseif ($GPA_1 >= 0 && $GPA_1 <= 59) {
            $score->gpa_quarter_1 = "F";
            $score->pts_1 = $score->subject->credit*0.0;
        } else {
            $error = "invalid input";
        }

        $GPA_2 = ($score->quarter_3 + $score->quarter_4) / 2;

        if ($GPA_2 >= 92.5 && $GPA_2 <= 100) {
            $score->gpa_quarter_2 = "A";
            $score->pts_2 = ($score->subject->credit*4)/2;
        } elseif ($GPA_2 >= 89.5 && $GPA_2 <= 92) {
            $score->gpa_quarter_2 = "A-";
            $score->pts_2 = ($score->subject->credit*3.70)/2;
        } elseif ($GPA_2 >= 86.5 && $GPA_2 <= 89) {
            $score->gpa_quarter_2 = "B+";
            $score->pts_2 = ($score->subject->credit*3.30)/2;
        } elseif ($GPA_2 >= 82.5 && $GPA_2 <= 86) {
            $score->gpa_quarter_2 = "B";
            $score->pts_2 = ($score->subject->credit*3.00)/2;
        } elseif ($GPA_2 >= 79.5 && $GPA_2 <= 82) {
            $score->gpa_quarter_2 = "B-";
            $score->pts_2 = ($score->subject->credit*2.70)/2;
        } elseif ($GPA_2 >= 76.5 && $GPA_2 <= 79) {
            $score->gpa_quarter_2 = "C+";
            $score->pts_2 = ($score->subject->credit*2.30)/2;
        } elseif ($GPA_2 >= 72.5 && $GPA_2 <= 76) {
            $score->gpa_quarter_2 = "C";
            $score->pts_2 = ($score->subject->credit*2.00)/2;
        } elseif ($GPA_2 >= 69.5 && $GPA_2 <= 72) {
            $score->gpa_quarter_2 = "C-";
            $score->pts_2 = ($score->subject->credit*1.70)/2;
        } elseif ($GPA_2 >= 66.5 && $GPA_2 <= 69) {
            $score->gpa_quarter_2 = "D+";
            $score->pts_2 = ($score->subject->credit*1.30)/2;
        } elseif ($GPA_2 >= 62.5 && $GPA_2 <= 66) {
            $score->gpa_quarter_2 = "D";
            $score->pts_2 = ($score->subject->credit*1.00)/2;
        } elseif ($GPA_2 >= 59.5 && $GPA_2 <= 62) {
            $score->gpa_quarter_2 = "D-";
            $score->pts_2 = ($score->subject->credit*0.70)/2;
        } elseif ($GPA_2 >= 0 && $GPA_2 <= 59) {
            $score->gpa_quarter_2 = "F";
            $score->pts_2 = ($score->subject->credit*0.00)/2;
        } else {
            $error = "invalid input";
        }

        $score->save();

        }

        Session::flash('success', 'You have successfully update your student score');

        return redirect()->back();
        //return redirect()->route('score.view', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }
}
