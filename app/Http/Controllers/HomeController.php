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
use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

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

        $this->gradeProfile = GradeProfile::all();
        View::share('gradeProfile', $this->gradeProfile);


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

    public function passwordForm($id){

        $student = StudentProfile::find($id);

       

        return view('end_user.end_user_change_password')
                    ->with('students', $student);
        
    }


    public function updatePassword(Request $request, $id)
    {
       // return 12345;
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $student = StudentProfile::find($id);

        $user = User::findOrFail($id);

        if (Hash::check(Input::get('oldPassword'), $user['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $user->password = bcrypt(Input::get('password'));
            $user->save();

            Session::flash('success', 'Password changed successfully!');
            return redirect('/studentProfile')->with('students', $student);
        } else {
            Session::flash('error', 'Your current password not match! Try Again');
            return redirect()->back();
        }

    }



}
