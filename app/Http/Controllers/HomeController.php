<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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
use App\Assignment;
use App\Teacher;
use App\PrekAbsent;
use App\SecondaryAbsent;
use App\AbsentRecord;


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

    public function studentAssignmentShow($student_id){
        $student = StudentProfile::find($student_id);
        $gradeID = $student->grade_profile_id;
        $assignment = Assignment::where('grade_profile_id', $gradeID)->orderBy('created_at', 'DECS')->get();

      //  return $assignment;
        return view('end_user.assignment_index')->with(['students'=> $student, 'assignment'=>$assignment]);
    }

    public function assignmentDetail($student_id, $assignment_id){
        $student = StudentProfile::find($student_id);
        $assignment = Assignment::find($assignment_id);

        return view('end_user.assignment_detail')->with(['students'=> $student, 'assignments'=>$assignment]);
    }


////////////////////////////////////////////////////////////////////////////////////

//view student

    public function viewStudentAbsent($student_id){

        $student = StudentProfile::find($student_id);
        return view('end_user.student_absent')->with('students', $student);

    }

//student absent by grade
    public function prekAbsentByGrade( $grade_id, $student_id ){

    $student = StudentProfile::find($student_id);

    $grade = KLevel::find($grade_id);

    $prekAbsent = PrekAbsent::where([
        ['k_level_id', $grade_id], 
        ['student_profile_id', $student_id],

    ])->orderBy('created_at', 'Desc')->get();

    


    $unexcused = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Unexcused']
    ])->count();
    $excused = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Excused']
    ])->count();
    $tardy = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Tardy']
    ])->count();


    $absent_tardy = 0;

    if($tardy >= 3){
        $absent_tardy = $tardy/3;
    }elseif($tardy<3){
        $absent_tardy;
    }


    $total_All_Absent = $absent_tardy+$excused+$unexcused;



    return view('end_user.absent_result_byGrade')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'prekAbsent'=> $prekAbsent,
        'unexcused'=>$unexcused,
        'totalAbsent'=>$total_All_Absent,
        'excused'=>$excused,
        'tardy'=>$tardy
        ]);


    }


    // ******* Secondary School Absent ******* //

public function secondaryAbsentByGrade($grade_id, $student_id){


    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);
    $secondaryAbsent = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id], 
        ['student_profile_id', $student_id],
    ])->orderBy('created_at', 'Desc')->get();



    $unexcused = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Unexcused']
    ])->count();
    $excused = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Excused']
    ])->count();
    $tardy = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Tardy']
    ])->count();


    $absent_tardy = 0;

    if($tardy >= 3){
        $absent_tardy = $tardy/3;
    }elseif($tardy<3){
        $absent_tardy;
    }


    $total_All_Absent = $absent_tardy+$excused+$unexcused;



    //return $highSchoolAbsent;
    
    return view('end_user.absent_result_byGrade')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'secondaryAbsent'=> $secondaryAbsent,
        'unexcused'=>$unexcused,
        'totalAbsent'=>$total_All_Absent,
        'excused'=>$excused,
        'tardy'=>$tardy
        ]);

}

// highschool absent record
public function highSchoolAbsentByGrade($grade_id, $student_id){

    $grade = Grade::find($grade_id);
    $student = StudentProfile::find($student_id);
    
    $highSchoolAbsent = AbsentRecord::where([
        ['grade_id', $grade_id], 
        ['student_profile_id', $student_id],
    ])->orderBy('created_at', 'Desc')->get();



 $unexcused = AbsentRecord::where([
     ['grade_id', $grade_id],
     ['student_profile_id', $student_id],
     ['absent_type', 'Unexcused']
    ])->count();
$excused = AbsentRecord::where([
     ['grade_id', $grade_id],
     ['student_profile_id', $student_id],
     ['absent_type', 'Excused']
    ])->count();
$tardy = AbsentRecord::where([
     ['grade_id', $grade_id],
     ['student_profile_id', $student_id],
     ['absent_type', 'Tardy']
    ])->count();



    // $totalExcuse;
     $absent_tardy = 0;

     if($tardy >= 3){
         $absent_tardy = $tardy/3;
     }elseif($tardy<3){
         $absent_tardy;
     }


     $total_All_Absent = $absent_tardy+$excused+$unexcused;
    


    
    return view('end_user.absent_result_byGrade')->with([
        'grade_id'=>$grade ,
        'students'=> $student,
        'hightSchoolAbsent'=> $highSchoolAbsent,
        'unexcused'=>$unexcused,
        'totalAbsent'=>$total_All_Absent,
        'excused'=>$excused,
        'tardy'=>$tardy
        ]);
}



//**********View Teacher*******************//

    public function viewTeacher($student_id){
        
        $student = StudentProfile::find($student_id);
    
        $teacher = Teacher::orderBy('first_name', 'ASC')->get();
        return view('end_user.view_all_teacher_index')->with([

            'students'=> $student,
            'teacher'=>$teacher
        
        ]);
    }


  //**********View Teacher profile *******************// 
  
  public function teacherProfile($student_id, $teacher_id){

        $student = StudentProfile::find($student_id);

        $teacher = Teacher::find($teacher_id);

        return view('end_user.profile_teacher')->with([

            'students'=>$student,
            'teachers'=>$teacher

        ]);

  } 








}
