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
use App\Admin;
use App\Staff;


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
    
        $teacher = Teacher::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
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

  //**********View all staff *******************// 

  public function viewStaff($student_id){
    $student = StudentProfile::find($student_id);
    
        $staff = Staff::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
        return view('end_user.view_staff_index')->with([

            'students'=> $student,
            'staff'=>$staff
        
        ]);
  }


  //**********View all staff *******************// 

  public function staffProfile($student_id, $staff_id){

        $student = StudentProfile::find($student_id);

        $staff = Staff::find($staff_id);

        return view('end_user.profile_staff')->with([

            'students'=>$student,
            'staff'=>$staff

        ]);

    }
//cgpa index

    public function studentCGPA($student_id){
        $student = StudentProfile::find($student_id);
        return view('end_user.cgpa_index')->with([

            'students'=> $student
        ]);
            
    }




//CGPA grade 9 to 10
    public function studentCGPA910(Request $request, $student_id){

        
        $student = StudentProfile::find($student_id);

        

        $grade_9 = 1; //get 1
        $grade_10 = 2; //get 2
        

        $score_grade_9 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_9)->get();
        $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();

        
        $credit_grade_9 = $score_grade_9->sum('credit')/2;
    
        $sum_pts_1_grade_9 = $score_grade_9->sum('pts_1');
    
        $sum_pts_2_grade_9 = $score_grade_9->sum('pts_2');
          

        //grade 10

        $credit_grade_10 = $score_grade_10->sum('credit')/2;
    
        $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
        $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

        if($credit_grade_9 > 0 
            && $credit_grade_10 > 0
            && $sum_pts_1_grade_9 > 0
            && $sum_pts_2_grade_9 > 0
            && $sum_pts_1_grade_10 > 0
            && $sum_pts_2_grade_10 > 0){

        $CGPA = (
                    $sum_pts_1_grade_9/$credit_grade_9 +
                    $sum_pts_2_grade_9/$credit_grade_9 +
                    $sum_pts_1_grade_10/$credit_grade_10 +
                    $sum_pts_2_grade_10/$credit_grade_10 
                    
                    )/4;
        $total_credit = $credit_grade_9*2 + $credit_grade_10*2;
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        }

        

        

        return view('end_user.cgpa.cgpa_grade_9_to_10')->with([
            'student'=> $student,
            'score_grade_9'=>$score_grade_9,
            'score_grade_10'=>$score_grade_10,
           

            'sum_pts_1_grade_9' => $sum_pts_1_grade_9,
            'sum_pts_2_grade_9' => $sum_pts_2_grade_9,
            'credit_grade_9' => $credit_grade_9,

            'sum_pts_1_grade_10' => $sum_pts_1_grade_10,
            'sum_pts_2_grade_10' => $sum_pts_2_grade_10,
            'credit_grade_10'=>$credit_grade_10,

            
            
            // total all credit and GPA

            'CGPA'=>$CGPA,
            'total_credit' =>$total_credit

        ]);
    
    }  



//CGPA grade 9 to 11
    public function studentCGPA911(Request $request, $student_id){

        
        $student = StudentProfile::find($student_id);

        

        $grade_9 = 1; //get 1
        $grade_10 = 2; //get 2
        $grade_11 = 3; //get 2
        

        $score_grade_9 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_9)->get();
        $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();
        $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();

        
        $credit_grade_9 = $score_grade_9->sum('credit')/2;
    
        $sum_pts_1_grade_9 = $score_grade_9->sum('pts_1');
    
        $sum_pts_2_grade_9 = $score_grade_9->sum('pts_2');
          

        //grade 10

        $credit_grade_10 = $score_grade_10->sum('credit')/2;
    
        $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
        $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

        //grade 10

        $credit_grade_11 = $score_grade_11->sum('credit')/2;
    
        $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
        $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');


        if($credit_grade_9 > 0 
            && $credit_grade_10 > 0
            && $credit_grade_11 > 0
            && $sum_pts_1_grade_9 > 0
            && $sum_pts_2_grade_9 > 0
            && $sum_pts_1_grade_10 > 0
            && $sum_pts_2_grade_10 > 0
            && $sum_pts_1_grade_11 > 0
            && $sum_pts_2_grade_11 > 0

        ){

        $CGPA = (
                    $sum_pts_1_grade_9/$credit_grade_9 +
                    $sum_pts_2_grade_9/$credit_grade_9 +
                    $sum_pts_1_grade_10/$credit_grade_10 +
                    $sum_pts_2_grade_10/$credit_grade_10 +
                    $sum_pts_1_grade_11/$credit_grade_11 +
                    $sum_pts_2_grade_11/$credit_grade_11 
                    
                    )/6;
        $total_credit = $credit_grade_9*2 + $credit_grade_10*2 + $credit_grade_11*2;
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        }

        return view('end_user.cgpa.cgpa_grade_9_to_11')->with([
            'student'=> $student,
            'score_grade_9'=>$score_grade_9,
            'score_grade_10'=>$score_grade_10,
            'score_grade_11'=>$score_grade_11,
           

            'sum_pts_1_grade_9' => $sum_pts_1_grade_9,
            'sum_pts_2_grade_9' => $sum_pts_2_grade_9,
            'credit_grade_9' => $credit_grade_9,

            'sum_pts_1_grade_10' => $sum_pts_1_grade_10,
            'sum_pts_2_grade_10' => $sum_pts_2_grade_10,
            'credit_grade_10'=>$credit_grade_10,

            'sum_pts_1_grade_11' => $sum_pts_1_grade_11,
            'sum_pts_2_grade_11' => $sum_pts_2_grade_11,
            'credit_grade_11'=>$credit_grade_11,

            
            
            // total all credit and GPA

            'CGPA'=>$CGPA,
            'total_credit' =>$total_credit

        ]);
    
    }   

    //Grade 9 to 12
    public function studentCGPA912( Request $request, $student_id){

    $checked_id = $request->input('grade');
    $student = StudentProfile::find($student_id);

    $collection = collect($checked_id);

    $grade_9 = 1; //get 1
    $grade_10 = 2; //get 2
    $grade_11 = 3; //get 3
    $grade_12 = 4; //get 4

    $score_grade_9 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_9)->get();
    $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();
    $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();
    $score_grade_12 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_12)->get();

        //Grade 9
            $credit_grade_9 = $score_grade_9->sum('credit')/2;
    
            $sum_pts_1_grade_9 = $score_grade_9->sum('pts_1');
    
            $sum_pts_2_grade_9 = $score_grade_9->sum('pts_2');

          

            //grade 10

            $credit_grade_10 = $score_grade_10->sum('credit')/2;
    
            $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
            $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

           

            


        // Grade 11
            $credit_grade_11 = $score_grade_11->sum('credit')/2;
    
            $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
            $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');

          
            

        // Grade 12
            $credit_grade_12 = $score_grade_12->sum('credit')/2;
    
            $sum_pts_1_grade_12 = $score_grade_12->sum('pts_1');
    
            $sum_pts_2_grade_12 = $score_grade_12->sum('pts_2');

           if($credit_grade_9 > 0 
            && $credit_grade_10 > 0
            && $credit_grade_11 > 0
            && $credit_grade_12 > 0
            && $sum_pts_1_grade_9 > 0
            && $sum_pts_2_grade_9 > 0
            && $sum_pts_1_grade_10 > 0
            && $sum_pts_2_grade_10 > 0
            && $sum_pts_1_grade_11 > 0
            && $sum_pts_2_grade_11 > 0
            && $sum_pts_1_grade_12 > 0
            && $sum_pts_2_grade_12 > 0

        ){

                // Calulate CGPA
           
                $CGPA = (
                    $sum_pts_1_grade_9/$credit_grade_9 +
                    $sum_pts_2_grade_9/$credit_grade_9 +
                    $sum_pts_1_grade_10/$credit_grade_10 +
                    $sum_pts_2_grade_10/$credit_grade_10 +
                    $sum_pts_1_grade_11/$credit_grade_11 +
                    $sum_pts_2_grade_11/$credit_grade_11 +
                    $sum_pts_1_grade_12/$credit_grade_12 +
                    $sum_pts_2_grade_12/$credit_grade_12
                    )/8;

        //total all credit for student
        $total_credit = $credit_grade_9*2 + $credit_grade_10*2 + $credit_grade_11*2 + $credit_grade_12*2;
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        } 

        return view('end_user.cgpa.cgpa_grade_9_to_12')->with([
        'student'=> $student,
        'score_grade_9'=>$score_grade_9,
        'score_grade_10'=>$score_grade_10,
        'score_grade_11'=>$score_grade_11,
        'score_grade_12'=>$score_grade_12,

        'sum_pts_1_grade_9' => $sum_pts_1_grade_9,
        'sum_pts_2_grade_9' => $sum_pts_2_grade_9,
        'credit_grade_9' => $credit_grade_9,

        'sum_pts_1_grade_10' => $sum_pts_1_grade_10,
        'sum_pts_2_grade_10' => $sum_pts_2_grade_10,
        'credit_grade_10'=>$credit_grade_10,

        'sum_pts_1_grade_11' => $sum_pts_1_grade_11,
        'sum_pts_2_grade_11' => $sum_pts_2_grade_11,
        'credit_grade_11'=>$credit_grade_11,

        'sum_pts_1_grade_12' => $sum_pts_1_grade_12,
        'sum_pts_2_grade_12' => $sum_pts_2_grade_12,
        'credit_grade_12'=>$credit_grade_12,
        
        // total all credit and GPA

        'CGPA'=>$CGPA,
        'total_credit' =>$total_credit

    ]);
    }

  


    //CGPA grade 10 to 11
    public function studentCGPA1011(Request $request, $student_id){

        $checked_id = $request->input('grade');
        $student = StudentProfile::find($student_id);

        $collection = collect($checked_id);

        
        $grade_10 = 2; //get 2
        $grade_11 = 3; //get 3
        

        $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();
        $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();
    


          

            //grade 10

            $credit_grade_10 = ($score_grade_10->sum('credit'))/2;
    
            $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
            $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

           

            


        // Grade 11
            $credit_grade_11 = ($score_grade_11->sum('credit'))/2;
    
            $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
            $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');

        if($credit_grade_10 > 0
            && $credit_grade_11 > 0
            
            
            && $sum_pts_1_grade_10 > 0
            && $sum_pts_2_grade_10 > 0
            && $sum_pts_1_grade_11 > 0
            && $sum_pts_2_grade_11 > 0
            

        ){
           
        // Calulate CGPA
           
        $CGPA = (
                    
                    $sum_pts_1_grade_10/$credit_grade_10 +
                    $sum_pts_2_grade_10/$credit_grade_10 +
                    $sum_pts_1_grade_11/$credit_grade_11 +
                    $sum_pts_2_grade_11/$credit_grade_11 
                    
                    )/4;

           
        //total all credit for student
        $total_credit = $credit_grade_10*2 + $credit_grade_11*2;

           
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        }
            


    return view('end_user.cgpa.cgpa_grade_10_to_11')->with([
        'student'=> $student,
        
        'score_grade_10'=>$score_grade_10,
        'score_grade_11'=>$score_grade_11,
        
        

        'sum_pts_1_grade_10' => $sum_pts_1_grade_10,
        'sum_pts_2_grade_10' => $sum_pts_2_grade_10,
        'credit_grade_10'=>$credit_grade_10,

        'sum_pts_1_grade_11' => $sum_pts_1_grade_11,
        'sum_pts_2_grade_11' => $sum_pts_2_grade_11,
        'credit_grade_11'=>$credit_grade_11,

        
        
        // total all credit and GPA

        'CGPA'=>$CGPA,
        'total_credit' =>$total_credit

    ]);
    
    }

      //CGPA transcript for Grade 11 - 12

    public function studentCGPA1112( Request $request, $student_id){

    $checked_id = $request->input('grade');
    $student = StudentProfile::find($student_id);

    $collection = collect($checked_id);

    
    $grade_11 = 3; //get 3
    $grade_12 = 4; //get 4

    
    $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();
    $score_grade_12 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_12)->get();

         


        // Grade 11
            $credit_grade_11 = $score_grade_11->sum('credit')/2;
    
            $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
            $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');

          
            

        // Grade 12
            $credit_grade_12 = $score_grade_12->sum('credit')/2;
    
            $sum_pts_1_grade_12 = $score_grade_12->sum('pts_1');
    
            $sum_pts_2_grade_12 = $score_grade_12->sum('pts_2');

    
    if($credit_grade_11 > 0
            && $credit_grade_12 > 0
            
            
            && $sum_pts_1_grade_11 > 0
            && $sum_pts_2_grade_11 > 0
            && $sum_pts_1_grade_12 > 0
            && $sum_pts_2_grade_12 > 0
            

        ){
           
        
        // Calulate CGPA
           
                $CGPA = (
                    
                    $sum_pts_1_grade_11/$credit_grade_11 +
                    $sum_pts_2_grade_11/$credit_grade_11 +
                    $sum_pts_1_grade_12/$credit_grade_12 +
                    $sum_pts_2_grade_12/$credit_grade_12
                    )/4;

        
        //total all credit for student
        $total_credit = $credit_grade_11*2 + $credit_grade_12*2;

           
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        }
           

        
    return view('end_user.cgpa.cgpa_grade_11_to_12')->with([
        'student'=> $student,
        
        'score_grade_11'=>$score_grade_11,
        'score_grade_12'=>$score_grade_12,

        

        'sum_pts_1_grade_11' => $sum_pts_1_grade_11,
        'sum_pts_2_grade_11' => $sum_pts_2_grade_11,
        'credit_grade_11'=>$credit_grade_11,

        'sum_pts_1_grade_12' => $sum_pts_1_grade_12,
        'sum_pts_2_grade_12' => $sum_pts_2_grade_12,
        'credit_grade_12'=>$credit_grade_12,
        
        // total all credit and GPA

        'CGPA'=>$CGPA,
        'total_credit' =>$total_credit

    ]);
    }


    //CGPA transcript for grade 10 to 12

    public function studentCGPA1012( Request $request, $student_id){

    $checked_id = $request->input('grade');
    $student = StudentProfile::find($student_id);

    $collection = collect($checked_id);

    
    $grade_10 = 2; //get 2
    $grade_11 = 3; //get 3
    $grade_12 = 4; //get 4

    
    $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();
    $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();
    $score_grade_12 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_12)->get();

        

          

            //grade 10

            $credit_grade_10 = $score_grade_10->sum('credit')/2;
    
            $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
            $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

           

            


        // Grade 11
            $credit_grade_11 = $score_grade_11->sum('credit')/2;
    
            $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
            $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');

          
            

        // Grade 12
            $credit_grade_12 = $score_grade_12->sum('credit')/2;
    
            $sum_pts_1_grade_12 = $score_grade_12->sum('pts_1');
    
            $sum_pts_2_grade_12 = $score_grade_12->sum('pts_2');

        if($credit_grade_10 > 0
            && $credit_grade_11 > 0
            && $credit_grade_12 > 0
            
            
            && $sum_pts_1_grade_10 > 0
            && $sum_pts_2_grade_10 > 0
            && $sum_pts_1_grade_11 > 0
            && $sum_pts_2_grade_11 > 0
            && $sum_pts_1_grade_12 > 0
            && $sum_pts_2_grade_12 > 0
            

        ){
           
        
        // Calulate CGPA
           
                $CGPA = (
                    
                    $sum_pts_1_grade_10/$credit_grade_10 +
                    $sum_pts_2_grade_10/$credit_grade_10 +
                    $sum_pts_1_grade_11/$credit_grade_11 +
                    $sum_pts_2_grade_11/$credit_grade_11 +
                    $sum_pts_1_grade_12/$credit_grade_12 +
                    $sum_pts_2_grade_12/$credit_grade_12
                    )/6;
       
        
        //total all credit for student
        $total_credit = $credit_grade_10*2 + $credit_grade_11*2 + $credit_grade_12*2;
  
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        }
           
          

    return view('end_user.cgpa.cgpa_grade_10_to_12')->with([
        'student'=> $student,
        
        'score_grade_10'=>$score_grade_10,
        'score_grade_11'=>$score_grade_11,
        'score_grade_12'=>$score_grade_12,

        

        'sum_pts_1_grade_10' => $sum_pts_1_grade_10,
        'sum_pts_2_grade_10' => $sum_pts_2_grade_10,
        'credit_grade_10'=>$credit_grade_10,

        'sum_pts_1_grade_11' => $sum_pts_1_grade_11,
        'sum_pts_2_grade_11' => $sum_pts_2_grade_11,
        'credit_grade_11'=>$credit_grade_11,

        'sum_pts_1_grade_12' => $sum_pts_1_grade_12,
        'sum_pts_2_grade_12' => $sum_pts_2_grade_12,
        'credit_grade_12'=>$credit_grade_12,
        
        // total all credit and GPA

        'CGPA'=>$CGPA,
        'total_credit' =>$total_credit

    ]);
    }


    //Report Card for Grade Pre-k and K

    public function prekReportCard($student_id){
        $student = Studentprofile::find($student_id);
        $grade_prek = KLevel::all()->take(-3);

        return view('end_user.prek.index_prek_report_card')
        ->with(['students'=>$student, 'grade_prek'=>$grade_prek]);
    }



//Report Card for Grade Pre-k detail

    public function prekReportCardDetail(Request $request, $student_id, $grade_id){

        $student = StudentProfile::find($student_id);

        $prek = KLevel::find($grade_id);

        $checked_id = $prek->id;

        $kscore = PrekScore::where('student_profile_id', $student_id)
        ->where('k_level_id', $grade_id)->get();

        //Personal Planning-Intellectual Development
        $PPI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PPI']] )
            ->where('k_level_id', $checked_id)->get();
        // English Language Arts-Intellectual Development
        $ELAI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'ELAI']] )
            ->where('k_level_id', $checked_id)->get();
        // Khmer Language Arts-Intellectual Development
        $KLAI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'KLAI']] )
            ->where('k_level_id', $checked_id)->get();
        // Mathematics-Intellectual Development
        $MI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MI']] )
            ->where('k_level_id', $checked_id)->get();
        // Social Studies-Intellectual Development
        $SSI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SSI']] )
            ->where('k_level_id', $checked_id)->get();
        // Science-Intellectual Development
        $SI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SI']] )
            ->where('k_level_id', $checked_id)->get();
        // Fine Arts-Aesthetic and Artistic Development
        $FAA = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'FAA']] )
            ->where('k_level_id', $checked_id)->get();
        // PEP : Physical Education-Physical Development
        $PEP = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PEP']] )
            ->where('k_level_id', $checked_id)->get();

        // SRS : Physical Education-Physical Development
        $SRS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SRS']] )
             ->where('k_level_id', $checked_id)->get();

               //Absent report         
   //Quarter_1
    $prek_absent_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->count();

    $prek_daypresent_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

    if($prek_daypresent_quarter_1 == null){
        $total_daypresent_1 = 0;
    }else{
        $total_daypresent_1 = $prek_daypresent_quarter_1->quarter_day_present;
    }
        
    //Quarter_2

    $prek_absent_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->count();

    $prek_daypresent_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

    if($prek_daypresent_quarter_2 == null){
        $total_daypresent_2 = 0;
    }else{
        $total_daypresent_2 = $prek_daypresent_quarter_2->quarter_day_present;
    }

    //Quarter_3
    $prek_absent_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->count();

    $prek_daypresent_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

    if($prek_daypresent_quarter_3 == null){
        $total_daypresent_3 = 0;
    }else{
        $total_daypresent_3 = $prek_daypresent_quarter_3->quarter_day_present;
    }

    //Quarter_4
    $prek_absent_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->count();

    $prek_daypresent_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

    if($prek_daypresent_quarter_4 == null){
        $total_daypresent_4 = 0;
    }else{
        $total_daypresent_4 = $prek_daypresent_quarter_4->quarter_day_present;
    }      

        return view('end_user.prek.detail_prek_report_card')
                    ->with([

            'kscore'=>$kscore,
            'student'=>$student,
            'subject_code_PPI'=>$PPI,
            'subject_code_ELAI'=>$ELAI,
            'subject_code_KLAI'=>$KLAI,
            'subject_code_MI'=>$MI,
            'subject_code_SSI'=>$SSI,
            'subject_code_SI'=>$SI,
            'subject_code_FAA'=>$FAA,
            'subject_code_PEP'=>$PEP,
            'subject_code_SRS'=>$SRS,

    //dayspresnt report

            //Quarter_1
            'total_daypresent_1'=>$total_daypresent_1,
            'prek_absent_quarter_1'=>$prek_absent_quarter_1,
            //Quarter_2
            'total_daypresent_2'=>$total_daypresent_2,
            'prek_absent_quarter_2'=>$prek_absent_quarter_2,

            //Quarter_3
            'total_daypresent_3'=>$total_daypresent_3,
            'prek_absent_quarter_3'=>$prek_absent_quarter_3,

            //Quarter_4
            'total_daypresent_4'=>$total_daypresent_4,
            'prek_absent_quarter_4'=>$prek_absent_quarter_4,

                    ]);
        

    }


    //Report Card for Grade K detail

    public function gradeKReportCard($student_id){

        $student = Studentprofile::find($student_id);
        $grade_k = KLevel::all()->take(3);

        return view('end_user.prek.index_gradeK_report_card')
        ->with(['students'=>$student, 'grade_k'=>$grade_k]);
    }

    //Report card for grade K detail
    public function gradeKReportCardDetail(Request $request, $student_id, $grade_id){

        $student = StudentProfile::find($student_id);

        $gradeK = KLevel::find($grade_id);

        $checked_id = $gradeK->id;

        $kscore = PrekScore::where('student_profile_id', $student_id)
        ->where('k_level_id', $checked_id)->get();

        //SD : Spiritual Development
        $SD = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SD']] )
            ->where('k_level_id', $checked_id)->get();
        // PD : Personal/Social Development
        $PD = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PD']] )
            ->where('k_level_id', $checked_id)->get();
        // ART = Art
        $ART = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'ART']] )
            ->where('k_level_id', $checked_id)->get();
        // MUSIC: Music
        $MUSIC = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MUSIC']] )
            ->where('k_level_id', $checked_id)->get();
        // DERWS: Demontrantes emergent reading and writing skills(English section)
        $DERWS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'DERWS']] )
            ->where('k_level_id', $checked_id)->get();
        // EAWSS: Exhibits appropriate word study skills(English section)
        $EAWSS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'EAWSS']] )
            ->where('k_level_id', $checked_id)->get();
        // DERWS_KH : Demontrantes emergent reading and writing skills (Khmer Section)
        $DERWS_KH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'DERWS_KH']] )
            ->where('k_level_id', $checked_id)->get();
        // EASWSS : Exhibits appropriate word study skills(Khmer section)
        $EAWSS_KH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'EAWSS_KH']] )
            ->where('k_level_id', $checked_id)->get();

        // MATH : Mathematics (Refer to tracking card)
        $MATH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MATH']] )
             ->where('k_level_id', $checked_id)->get();

        // PEDH : Physical Educe do / Health(Refer to tracking card)
        $PEDH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PEDH']] )
             ->where('k_level_id', $checked_id)->get();
        // SCIENCE : Science
        $SCIENCE = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SCIENCE']] )
             ->where('k_level_id', $checked_id)->get(); 

        // SS : Social Science
        $SS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SS']] )
             ->where('k_level_id', $checked_id)->get(); 
             
               //Absent report         
   //Quarter_1
    $prek_absent_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->count();

    $prek_daypresent_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

    if($prek_daypresent_quarter_1 == null){
        $total_daypresent_1 = 0;
    }else{
        $total_daypresent_1 = $prek_daypresent_quarter_1->quarter_day_present;
    }
        
    //Quarter_2

    $prek_absent_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->count();

    $prek_daypresent_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

    if($prek_daypresent_quarter_2 == null){
        $total_daypresent_2 = 0;
    }else{
        $total_daypresent_2 = $prek_daypresent_quarter_2->quarter_day_present;
    }

    //Quarter_3
    $prek_absent_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->count();

    $prek_daypresent_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

    if($prek_daypresent_quarter_3 == null){
        $total_daypresent_3 = 0;
    }else{
        $total_daypresent_3 = $prek_daypresent_quarter_3->quarter_day_present;
    }

    //Quarter_4
    $prek_absent_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->count();

    $prek_daypresent_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)
    ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

    if($prek_daypresent_quarter_4 == null){
        $total_daypresent_4 = 0;
    }else{
        $total_daypresent_4 = $prek_daypresent_quarter_4->quarter_day_present;
    }      


        return view('end_user.prek.detail_gradeK_report_card')
                    ->with([

            'kscore'=>$kscore,
            'student'=>$student,
            'subject_code_SD'=>$SD,
            'subject_code_PD'=>$PD,
            'subject_code_ART'=>$ART,
            'subject_code_MUSIC'=>$MUSIC,
            'subject_code_DERWS'=>$DERWS,
            'subject_code_EAWSS'=>$EAWSS,
            'subject_code_DERWS_KH'=>$DERWS_KH,
            'subject_code_EAWSS_KH'=>$EAWSS_KH,
            'subject_code_MATH'=>$MATH,
            'subject_code_PEDH'=>$PEDH,
            'subject_code_SCIENCE'=>$SCIENCE,
            'subject_code_SS'=>$SS,

        //dayspresnt report

            //Quarter_1
            'total_daypresent_1'=>$total_daypresent_1,
            'prek_absent_quarter_1'=>$prek_absent_quarter_1,
            //Quarter_2
            'total_daypresent_2'=>$total_daypresent_2,
            'prek_absent_quarter_2'=>$prek_absent_quarter_2,

            //Quarter_3
            'total_daypresent_3'=>$total_daypresent_3,
            'prek_absent_quarter_3'=>$prek_absent_quarter_3,

            //Quarter_4
            'total_daypresent_4'=>$total_daypresent_4,
            'prek_absent_quarter_4'=>$prek_absent_quarter_4,

                    ]);
        


    }

    

    //Report card for Grade 1 to 8

    public function secondaryReportCard($student_id){

        $student = Studentprofile::find($student_id);
        $grade_secondary = SecondaryLevel::all();

        return view('end_user.secondary_school.index_secondary_report_card')
        ->with(['students'=>$student, 'grade_secondary'=>$grade_secondary]);
    }

    //Report card for Grade 1 to 8 detail formate
    public function secondaryReportCardDetail(Request $request, $student_id, $grade_id){

        $student = StudentProfile::find($student_id);

        $seconday = SecondaryLevel::find($grade_id);

        $checked_id = $seconday->id;

        $secondaryscore = secondaryScore::where('student_profile_id', $student_id)
        ->where('secondary_level_id', $checked_id)->get();

         //Quarter_1
    $secondaryschool_absent_quarter_1 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->count();

    $secondaryschool_daypresent_quarter_1 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

    if($secondaryschool_daypresent_quarter_1 == null){
        $total_daypresent_1 = 0;
    }else{
        $total_daypresent_1 = $secondaryschool_daypresent_quarter_1->quarter_day_present;
    }
        
    //Quarter_2

    $secondaryschool_absent_quarter_2 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->count();

    $secondaryschool_daypresent_quarter_2 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

    if($secondaryschool_daypresent_quarter_2 == null){
        $total_daypresent_2 = 0;
    }else{
        $total_daypresent_2 = $secondaryschool_daypresent_quarter_2->quarter_day_present;
    }

    //Quarter_3
    $secondaryschool_absent_quarter_3 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->count();

    $secondaryschool_daypresent_quarter_3 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

    if($secondaryschool_daypresent_quarter_3 == null){
        $total_daypresent_3 = 0;
    }else{
        $total_daypresent_3 = $secondaryschool_daypresent_quarter_3->quarter_day_present;
    }

    //Quarter_4
    $secondaryschool_absent_quarter_4 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->count();

    $secondaryschool_daypresent_quarter_4 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

    if($secondaryschool_daypresent_quarter_1 == null){
        $total_daypresent_4 = 0;
    }else{
        $total_daypresent_4 = $secondaryschool_daypresent_quarter_4->quarter_day_present;
    }

    $yearly_absent = $secondaryschool_absent_quarter_1 +
        $secondaryschool_absent_quarter_2+
        $secondaryschool_absent_quarter_3+
        $secondaryschool_absent_quarter_4;

        $yearly_daypresent = $total_daypresent_1+$total_daypresent_2+$total_daypresent_3+$total_daypresent_4;

    return view('end_user.secondary_school.detail_secondary_report_card')
            ->with([

            'secondaryscore'=>$secondaryscore,
            'student'=>$student,
            //Quarter_1
            'total_daypresent_1'=>$total_daypresent_1,
            'secondaryschool_absent_quarter_1'=>$secondaryschool_absent_quarter_1,
            //Quarter_2
            'total_daypresent_2'=>$total_daypresent_2,
            'secondaryschool_absent_quarter_2'=>$secondaryschool_absent_quarter_2,

            //Quarter_3
            'total_daypresent_3'=>$total_daypresent_3,
            'secondaryschool_absent_quarter_3'=>$secondaryschool_absent_quarter_3,

            //Quarter_4
            'total_daypresent_4'=>$total_daypresent_4,
            'secondaryschool_absent_quarter_4'=>$secondaryschool_absent_quarter_4,
            'yearly_daypresent'=>$yearly_daypresent,
            'yearly_absent'=>$yearly_absent,
        ]);


    }

    //Report card for high school

    public function highschoolReportCard($student_id){

        $student = Studentprofile::find($student_id);
        $grade_highschool = Grade::all();

        return view('end_user.high_school.index_high_report_card')
        ->with(['students'=>$student, 'grade_highschool'=>$grade_highschool]);
    }


 //Report card for high school detail formate

    public function highschoolReportCardDetail(Request $request, $student_id, $grade_id)
    {

        $student = StudentProfile::find($student_id);

        $highschool = Grade::find($grade_id);

        $checked_id = $highschool->id;


        $semester_1 = Score::where('student_profile_id', $student_id)
            ->where([['grade_id', $checked_id]])->orderBy('grade_id', 'ASC')->get();


        $sum_pts_1 = Score::where('student_profile_id', $student_id)
            ->where([['grade_id', $checked_id]])->sum('pts_1');

        $sum_pts_2 = Score::where('student_profile_id', $student_id)
            ->where([['grade_id', $checked_id]])->sum('pts_2');


        //Quarter_1
        $highschool_absent_quarter_1 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
        ->where('quarter_name','Quarter_1')->count();

        $highschool_daypresent_quarter_1 = AbsentRecord::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

        if($highschool_daypresent_quarter_1 == null){
            $total_daypresent_1 = 0;
        }else{
            $total_daypresent_1 = $highschool_daypresent_quarter_1->quarter_day_present;
        }
            
        //Quarter_2

        $highschool_absent_quarter_2 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
        ->where('quarter_name','Quarter_2')->count();

        $highschool_daypresent_quarter_2 = AbsentRecord::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

        if($highschool_daypresent_quarter_2 == null){
            $total_daypresent_2 = 0;
        }else{
            $total_daypresent_2 = $highschool_daypresent_quarter_2->quarter_day_present;
        }

        //Quarter_3
        $highschool_absent_quarter_3 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
        ->where('quarter_name','Quarter_3')->count();

        $highschool_daypresent_quarter_3 = AbsentRecord::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

        if($highschool_daypresent_quarter_3 == null){
            $total_daypresent_3 = 0;
        }else{
            $total_daypresent_3 = $highschool_daypresent_quarter_3->quarter_day_present;
        }

        //Quarter_4
        $highschool_absent_quarter_4 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
        ->where('quarter_name','Quarter_4')->count();

        $highschool_daypresent_quarter_4 = AbsentRecord::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

        if($highschool_daypresent_quarter_4 == null){
            $total_daypresent_4 = 0;
        }else{
            $total_daypresent_4 = $highschool_daypresent_quarter_4->quarter_day_present;
        }

        $yearly_absent = $highschool_absent_quarter_1+$highschool_absent_quarter_2+
            $highschool_absent_quarter_3+
            $highschool_absent_quarter_4;

        $yearly_daypresent = $total_daypresent_1+$total_daypresent_2+$total_daypresent_3+$total_daypresent_4;    



        //  $date = Score::where('student_profile_id', $student_id)
        // ->where([ ['grade_id', $checked_id], ['semester', 2] ])->first();


        return view('end_user.high_school.detail_high_report_card')
            ->with([
                
            'semester_1' => $semester_1,
            'student' => $student,
            'sum_pts_1' => $sum_pts_1,
            'sum_pts_2' => $sum_pts_2,
            
            //Quarter_1  
            'total_daypresent_1'=>$total_daypresent_1,
            'highschool_absent_quarter_1'=>$highschool_absent_quarter_1,
            //Quarter_2
            'total_daypresent_2'=>$total_daypresent_2,
            'highschool_absent_quarter_2'=>$highschool_absent_quarter_2,

            //Quarter_3
            'total_daypresent_3'=>$total_daypresent_3,
            'highschool_absent_quarter_3'=>$highschool_absent_quarter_3,

            //Quarter_4
            'total_daypresent_4'=>$total_daypresent_4,
            'highschool_absent_quarter_4'=>$highschool_absent_quarter_4,
            
            //yearly
            'yearly_daypresent'=>$yearly_daypresent,
            'yearly_absent'=>$yearly_absent,

            ]);
    }




}
