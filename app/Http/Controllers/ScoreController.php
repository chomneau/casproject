<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\KLevel;
use App\PrimaryLevel;
use App\Score;
use App\SecondaryLevel;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use App\StudentProfile;
use App\User;
use Session;
use View;

class ScoreController extends Controller
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

    public function viewScore($grade_id, $student_id){
        $score = Score::where([
            ['student_profile_id', $student_id],
            ['grade_id', $grade_id],
        ])->get();
        $gradeId = Grade::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);
        
        return view('admin.student.high_school.index_highschool')
            ->with([
                'grade_id'=>$gradeId,
                'scores'=>$score,
                'students'=>$student,
            ]);
    
    }





}
