<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use App\Location;
use View;
use App\StudentProfile;
use App\Grade;
use App\KLevel;
use App\Score;
use App\SecondaryLevel;
use App\SecondaryScore;
use App\Subject;
use Session;
use App\PrimarySubject;
use App\PrekScore;
use App\KSubject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');


        $this->grade = Grade::all();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::all();
        View::share('kgrade', $this->kgrade);

        $this->secondaryGrade = SecondaryLevel::all();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->subject = Subject::all();
        View::share('subject', $this->subject);

    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $students = User::find($user_id)->Studentprofile;

       // return $students->first_name;
        return view('end_user.index')->with(['students' => $students]);
    }

    public function viewPrekScore($grade_id, $student_id)
    {
        $prekScore = PrekScore::where([
            ['student_profile_id', $student_id],
            ['k_level_id', $grade_id],
        ])->get();
        $gradeId = KLevel::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);

        return view('end_user.pre_score_index')
            ->with([
                'grade_id' => $gradeId,
                'prekScores' => $prekScore,
                'students' => $student,
            ]);

    }

    public function viewSecondaryScore($grade_id, $student_id)
    {
        $secondaryScore = SecondaryScore::where([
            ['student_profile_id', $student_id],
            ['secondary_level_id', $grade_id],
        ])->get();
        $gradeId = SecondaryLevel::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);

        return view('end_user.secondary_score_index')
            ->with([
                'grade_id' => $gradeId,
                'secondaryScore' => $secondaryScore,
                'students' => $student,
            ]);
    }

    public function viewHighschoolScore($grade_id, $student_id){
        $score = Score::where([
            ['student_profile_id', $student_id],
            ['grade_id', $grade_id],
        ])->get();
        $gradeId = Grade::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);
        
        return view('end_user.highschool_score_index')
            ->with([
                'grade_id'=>$gradeId,
                'score'=>$score,
                'students'=>$student,
            ]);
    
    }

}
