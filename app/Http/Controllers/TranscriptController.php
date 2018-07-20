<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentProfile;
use App\Score;
use App\Grade;
use View;
use App\KLevel;
use App\PrimaryLevel;
use App\SecondaryLevel;
use App\Subject;

class TranscriptController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');


        $this->grade = Grade::all();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::all();
        View::share('kgrade', $this->kgrade);

        $this->primaryGrade = PrimaryLevel::all();
        View::share('primaryGrade', $this->primaryGrade);

        $this->secondaryGrade = SecondaryLevel::all();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->subject = Subject::all();
        View::share('subject', $this->subject); 

    }


    public function selectTranscript($student_id){
        $student = StudentProfile::find($student_id);
       // $grade = Grade::find($grade_id);
        $score = score::where('student_profile_id',$student_id)->get();

        return view('admin.student.print.select_grade')
        ->with(['student'=> $student, 'score'=>$score]);
    }

    public function selectOption($student_id){

    	$student = StudentProfile::find($student_id);
    	$grade = Grade::all();

    	return view('admin.student.print.print_option')
    			->with(['students'=>$student, 'grade'=>$grade]);



    }

}
