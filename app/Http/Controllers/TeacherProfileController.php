<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\User;
use App\Grade;
use App\KLevel;
use App\Score;
use App\SecondaryLevel;
use App\Subject;
use App\Assignment;

use App\StudentProfile;

use View;
use App\AbsentRecord;
use App\Absent;
use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\PrekScore;
use App\SecondaryScore;
use App\KSubject;
use App\PrimarySubject;
use App\Staff;







class TeacherProfileController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:teacher');

        $this->grade = Grade::all();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::orderBy('name', 'asc')->get();
        View::share('kgrade', $this->kgrade);


        $this->secondaryGrade = SecondaryLevel::orderBy('name', 'asc')->get();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->subject = Subject::all();
        View::share('subject', $this->subject);

        // $this->absent = Absent::all();
        // View::share('absent', $this->absent);

        $this->absentRecord = AbsentRecord::all();
        View::share('absentRecord', $this->absentRecord);

        $this->gradeProfile = GradeProfile::all();
        View::share('gradeProfile', $this->gradeProfile);

        // $this->teacher = Teacher::find(Auth()->user());
        // View::share('teacher', $this->teacher);
    }


    public function index(){

        $countAllStudent = StudentProfile::all()->count();
        $countFemaleStudent = StudentProfile::where('gender','Female')->count();
        $countMaleStudent = StudentProfile::where('gender','Male')->count();

        $countQuit = StudentProfile::where('status', 'Quit')->count();

        $countQuit_female = StudentProfile::where('status','Quit')
        ->where('gender','Female')->count();

        $countQuit_male = StudentProfile::where('status','Quit')
        ->where('gender','Male')->count(); 
           

        $countGraduationStudent = StudentProfile::where('status', 'Graduated')->count();
        $countGraduation_male = StudentProfile::where('status', 'Graduated')->where('gender','Male')->count();

        $countGraduation_female = StudentProfile::where('status', 'Graduated')->where('gender','Female')->count();



        $countNewStudent = StudentProfile::where('status', 'New')->count();
        $countNewStudent_female = StudentProfile::where('status', 'New')->where('gender','Female')->count();
        $countNewStudent_male = StudentProfile::where('status', 'New')->where('gender','Male')->count();


        //teacher
        $totalTeacher = Teacher::all()->count();
        $countMaleTeacher = Teacher::where('gender','Male')->count();
        $countFemaleTeacher = Teacher::where('gender','Female')->count();

        //staff

        $allStaff = Staff::all()->count();
        $countMaleStaff = Staff::where('gender','Male')->count();
        $countFemaleStaff = Staff::where('gender','Female')->count();

        
        return view('admin.index')->with([
            'countAllStudent'=>$countAllStudent,
            'countFemaleStudent'=>$countFemaleStudent,
            'countMaleStudent'=>$countMaleStudent,

            'countQuitStudent'=>$countQuit,
            'countQuit_female'=>$countQuit_female,
            'countQuit_male'=>$countQuit_male,

            'countNewStudent'=>$countNewStudent,
            'countNewStudent_female'=>$countNewStudent_female,
            'countNewStudent_male'=>$countNewStudent_male,

            'countGraduationStudent'=>$countGraduationStudent,
            'countGraduation_female'=>$countGraduation_female,
            'countGraduation_male'=>$countGraduation_male,
            
            'countMaleTeacher'=>$countMaleTeacher,
            'countFemaleTeacher'=>$countFemaleTeacher,
            'totalTeacher'=>$totalTeacher,

            'allStaff'=>$allStaff,
            'countMaleStaff'=>$countMaleStaff,
            'countFemaleStaff'=>$countFemaleStaff,


            ]);

        
    }

    

    //teacher profile

    public function teacherProfile(){
        $teacher = Teacher::find(Auth::user()->id);
        return view('admin.teacher.teacher_profile')->with('teacher', $teacher);
    }


      //show all students

    public function viewStudent($teacher_id){
    
        $student = StudentProfile::orderBy('created_at', 'desc')
            ->paginate(10);

       // $grade = Grade::all();

        $teacher = Teacher::find($teacher_id);    

        return view('admin.student.view_all_student')
            ->with(['student'=>$student, 'teacher'=>$teacher]);
           // ->with('grade', $grade)

    }

    //view student detail
    public function studentDetail($teacher_id, $student_id)
    {
        $student = StudentProfile::find($student_id);
        $teacher = Teacher::find($teacher_id); 
       // $absentRecord = AbsentRecord::find($absentRecord_id)
        return view('admin.student.student_detail')
            ->with([
                'students'=>$student, 
               'teacher'=>$teacher
                ]);
    }


//view student detail only profile not score
    public function onlyStudentProfile($teacher_id, $student_id)
    {
        $student = StudentProfile::find($student_id);
        $teacher = Teacher::find($teacher_id); 
    
        return view('admin.student.only_student_profile')
            ->with([
                'students'=>$student, 
               'teacher'=>$teacher
                ]);
    }

    //score for k and pre_k 

    public function prekScore($teacher_id, $grade_id, $student_id)
    {
        $prekScore = PrekScore::where([
            ['student_profile_id', $student_id],
            ['k_level_id', $grade_id],
        ])->get();
        $gradeId = KLevel::find($grade_id);
      
        $student = StudentProfile::find($student_id);
        $teacher = Teacher::find($teacher_id); 

        return view('admin.student.pre_school.preschool_score_view')
            ->with([
                'grade_id' => $gradeId,
                'prekScores' => $prekScore,
                'students' => $student,
                'teacher'=>$teacher
            ]);

    }

    //add subject to prekScore table show form
    public function showPrekAddSubject($teacher_id, $grade_id, $student_id)
    {
        $subject = KSubject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);
        $teacher = Teacher::find($teacher_id); 
        return view('admin.student.pre_school.preschool_add_subject_to_grade')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade,
                'teacher'=>$teacher
            ]);
    }

    //add subject to prescore function add
    public function prekAddSubject(Request $request,$teacher_id, $grade_id, $student_id)
    {

        $studentprofile = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);
        $teacher = Teacher::find($teacher_id);
        $score = new PrekScore();
        $score->student_profile_id = $studentprofile->id;
        $score->k_level_id = $grade->id;
        $score->k_subject_id = $request->subject_id;

        $score->save();

        Session::flash('success', 'You have successfully inserted your subject to student');
        return redirect()->route('teacher.prekschool.score', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id, 'teacher_id'=>$teacher->id]);
    }


    //Edit Prek_subject
    public function prekEditSubject($teacher_id, $score_id, $grade_id, $student_id)
    {

        $score = PrekScore::find($score_id);

        $student = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);
        $teacher = Teacher::find($teacher_id);

        return view('admin.student.pre_school.edit_preschool_score')->with([
            'scores' => $score,
            'students' => $student,
            'grade_id' => $grade,
            'teacher'=>$teacher
        ]);

    }

    //update pre-school score subject

    public function updatePrekScore(Request $request)
    {

        PrekScore::find($request->pk)->update([$request->name => $request->value]);
        return response()->json(['success'=>'done']);


    //     $grade = KLevel::find($grade_id);
    //     $studentprofile = StudentProfile::find($student_id);

    //     $score = PrekScore::find($score_id);
    //     $teacher = Teacher::find($teacher_id);


    //   //  return 'grade_id ='.$grade->id.'score ='.$score->id.'student ='.$studentprofile->id;

    //     $score->quarter_1 = $request->quarter1;
    //     $score->quarter_2 = $request->quarter2;
    //     $score->quarter_3 = $request->quarter3;
    //     $score->quarter_4 = $request->quarter4;

    //     if ($score->quarter_1 == 0 || $score->quarter_2 == 0) {

    //         $score->semester_1 = 0;

    //     } else {

    //         $GPA_1 = ($score->quarter_1 + $score->quarter_2) / 2;
    //         $score->semester_1 = $GPA_1;

    //     }

    //     if ($score->quarter_3 == 0 || $score->quarter_4 == 0) {

    //         $score->semester_2 = 0;

    //     } else {

    //         $GPA_2 = ($score->quarter_3 + $score->quarter_4) / 2;
    //         $score->semester_2 = $GPA_2;

    //     }

    //     //$sem_1 = $score->semester_1;
    //     //$sem_2 = $score->semester_2;


    //     if ($score->semester_1 == 0 || $score->semester_2 == 0) {
    //         $score->yearly = 0;
    //     } else {

    //         $yearly = ($score->semester_1 + $score->semester_2) / 2;
    //         $score->yearly = $yearly;
    //     }



    //     $score->save();

    //     Session::flash('success', 'You have successfully update your student score');

    //     return redirect()->route('teacher.prekschool.score', ['teacher_id'=>$teacher->id,'grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }
//Delete pre-school student score

    public function DeletePrekScore($score_id){
        $score = PrekScore::find($score_id);
        $score->delete();

        Session::flash('success', 'You have successfully delete a subject');
        return redirect()->back();

    }




    //secondary score

    public function secondaryScore($teacher_id, $grade_id, $student_id)
    {
        $secondaryScore = SecondaryScore::where([
            ['student_profile_id', $student_id],
            ['secondary_level_id', $grade_id],
        ])->get();
        $gradeId = SecondaryLevel::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);
        $teacher = Teacher::find($teacher_id);

        return view('admin.student.secondary_school.secondary_score_view')
            ->with([
                'grade_id' => $gradeId,
                'secondaryScores' => $secondaryScore,
                'students' => $student,
                'teacher'=>$teacher
            ]);

    }

    //add subject to score table show form secondary student
    public function showSecondaryAddSubject($teacher_id, $grade_id, $student_id)
    {
        $subject = PrimarySubject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);
        $teacher = Teacher::find($teacher_id);
        return view('admin.student.secondary_school.secondary_add_subject_to_grade')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade,
                'teacher'=>$teacher
            ]);
    }


    //add subject to table

    public function secondaryAddSubject(Request $request,$teacher_id, $grade_id, $student_id)
    {
        $studentprofile = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);
        $teacher = Teacher::find($teacher_id);

        $score = new SecondaryScore();
        $score->student_profile_id = $studentprofile->id;
        $score->secondary_level_id = $grade->id;
        $score->primary_subject_id = $request->subject_id;

        $score->save();

       //echo "done";

        Session::flash('success', 'You have successfully inserted your student score');
        //return redirect()->back();
        return redirect()->route('teacher.score.secondary', ['teacher_id'=>$teacher->id,'grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }

    //Edit secondaryScore table
    public function editSecondaryScoreForm($teacher_id, $score_id, $grade_id, $student_id)
    {

        $score = SecondaryScore::find($score_id);

        $student = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);
        $teacher = Teacher::find($teacher_id);

        return view('admin.student.secondary_school.edit_secondary_score')->with([
            'scores' => $score,
            'students' => $student,
            'grade_id' => $grade,
            'teacher'=>$teacher
        ]);

    }

    public function updateSecondaryScore(Request $request)
    {

        SecondaryScore::find($request->pk)->update([$request->name => $request->value]);
        return response()->json(['success'=>'done']);


    //     $grade = SecondaryLevel::find($grade_id);
    //     $studentprofile = StudentProfile::find($student_id);

    //     $score = SecondaryScore::find($score_id);
    //     $teacher = Teacher::find($teacher_id);


    //   //  return 'grade_id ='.$grade->id.'score ='.$score->id.'student ='.$studentprofile->id;

    //     $score->quarter_1 = $request->quarter1;
    //     $score->quarter_2 = $request->quarter2;
    //     $score->quarter_3 = $request->quarter3;
    //     $score->quarter_4 = $request->quarter4;

    //     if ($score->quarter_1 == 0 || $score->quarter_2 == 0) {

    //         $score->semester_1 = 0;

    //     } else {

    //         $GPA_1 = ($score->quarter_1 + $score->quarter_2) / 2;
    //         $score->semester_1 = $GPA_1;

    //     }

    //     if ($score->quarter_3 == 0 || $score->quarter_4 == 0) {

    //         $score->semester_2 = 0;

    //     } else {

    //         $GPA_2 = ($score->quarter_3 + $score->quarter_4) / 2;
    //         $score->semester_2 = $GPA_2;

    //     }

    //     //$sem_1 = $score->semester_1;
    //     //$sem_2 = $score->semester_2;


    //     if ($score->semester_1 == 0 || $score->semester_2 == 0) {
    //         $score->yearly = 0;
    //     } else {

    //         $yearly = ($score->semester_1 + $score->semester_2) / 2;
    //         $score->yearly = $yearly;
    //     }



    //     $score->save();

    //     Session::flash('success', 'You have successfully update your student score');

    //     return redirect()->route('teacher.score.secondary', ['teacher_id'=>$teacher->id,'grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }

    //deleted subject from secondaryScore
    public function destroySecondaryScore($id)
    {
        $deleteScore = SecondaryScore::find($id);
        $deleteScore->delete();
        Session::flash('success', 'You have successfully delete score from student');
        return redirect()->back();

    }









    //view high school student score

    public function viewScore($teacher_id, $grade_id, $student_id){
        $score = Score::where([
            ['student_profile_id', $student_id],
            ['grade_id', $grade_id],
        ])->get();
        $gradeId = Grade::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);
        $teacher = Teacher::find($teacher_id);
        
        return view('admin.student.high_school.index_highschool')
            ->with([
                'grade_id'=>$gradeId,
                'scores'=>$score,
                'students'=>$student,
                'teacher'=>$teacher
            ]);
    
    }

    //query subjects show form to add to score table
    public function SubjectByGrade($teacher_id, $grade_id, $student_id)
    {
        $subject = Subject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        $teacher = Teacher::find($teacher_id);
        return view('admin.student.high_school.add_subject_tograde')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade,
                'teacher'=>$teacher
            ]);
    }

    public function insertScore(Request $request, $teacher_id, $student_id, $grade_id)
    {
        $studentprofile = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        $teacher = Teacher::find($teacher_id);
        $score = new Score();
        $score->student_profile_id = $studentprofile->id;
        $score->grade_id = $grade->id;
        $score->subject_id = $request->subject_id;


        $score->save();
        Session::flash('success', 'You have successfully inserted your student score');
       // return redirect()->back();
       return redirect()->route('teacher.score.view', ['teacher_id' => $teacher->id, 'grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }

    //Edit student score (teacher panel)
    public function editScore($teacher_id, $score_id, $grade_id, $student_id)
    {

        $score = Score::find($score_id);
        $teacher = Teacher::find($teacher_id);

        $student = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);

        return view('admin.student.high_school.edit_score_highschool')->with([
            'scores' => $score,
            'students' => $student,
            'grade_id' => $grade,
            'teacher'=>$teacher
        ]);

    }


//deleted subject from student score table
    public function destroyScore($id)
    {
        $deleteScore = Score::find($id);
        $deleteScore->delete();
        Session::flash('success', 'You have successfully delete score from student');
        return redirect()->back();

    }

//update student score for high school (teacher Panel)
    public function updateScore(Request $request, $teacher_id, $score_id, $grade_id, $student_id)
    {
        $grade = Grade::find($grade_id);
        $studentprofile = StudentProfile::find($student_id);
        $teacher = Teacher::find($teacher_id);

        $score = Score::find($score_id);


      //  return 'grade_id ='.$grade->id.'score ='.$score->id.'student ='.$studentprofile->id;

        $score->quarter_1 = $request->quarter1;
        $score->quarter_2 = $request->quarter2;
        $score->quarter_3 = $request->quarter3;
        $score->quarter_4 = $request->quarter4;

        if($score->subject_id = $score->subject->id){
            $score->credit = $score->subject->credit;
            $score->save();
        }

        

        $GPA_1 = ($score->quarter_1 + $score->quarter_2) / 2;


        if ($GPA_1 >= 93 && $GPA_1 <= 100) {
            $score->gpa_quarter_1 = "A";
            $score->pts_1 = $score->subject->credit*4;
        } elseif ($GPA_1 >= 90 && $GPA_1 <= 92) {
            $score->gpa_quarter_1 = "A-";
            $score->pts_1 = $score->subject->credit*3.70;
        } elseif ($GPA_1 >= 87 && $GPA_1 <= 89) {
            $score->gpa_quarter_1 = "B+";
            $score->pts_1 = $score->subject->credit*3.30;
        } elseif ($GPA_1 >= 83 && $GPA_1 <= 86) {
            $score->gpa_quarter_1 = "B";
            $score->pts_1 = $score->subject->credit*3.00;
        } elseif ($GPA_1 >= 80 && $GPA_1 <= 82) {
            $score->gpa_quarter_1 = "B-";
            $score->pts_1 = $score->subject->credit*2.70;
        } elseif ($GPA_1 >= 77 && $GPA_1 <= 79) {
            $score->gpa_quarter_1 = "C+";
            $score->pts_1 = $score->subject->credit*2.30;
        } elseif ($GPA_1 >= 73 && $GPA_1 <= 76) {
            $score->gpa_quarter_1 = "C";
            $score->pts_1 = $score->subject->credit*2.00;
        } elseif ($GPA_1 >= 70 && $GPA_1 <= 72) {
            $score->gpa_quarter_1 = "C-";
            $score->pts_1 = $score->subject->credit*1.70;
        } elseif ($GPA_1 >= 67 && $GPA_1 <= 69) {
            $score->gpa_quarter_1 = "D+";
            $score->pts_1 = $score->subject->credit*1.30;
        } elseif ($GPA_1 >= 63 && $GPA_1 <= 66) {
            $score->gpa_quarter_1 = "D";
            $score->pts_1 = $score->subject->credit*1.00;
        } elseif ($GPA_1 >= 60 && $GPA_1 <= 62) {
            $score->gpa_quarter_1 = "D-";
            $score->pts_1 = $score->subject->credit*0.70;
        } elseif ($GPA_1 >= 0 && $GPA_1 <= 59) {
            $score->gpa_quarter_1 = "F";
            $score->pts_1 = $score->subject->credit*0.0;
        } else {
            $error = "invalid input";
        }



        $GPA_2 = ($score->quarter_3 + $score->quarter_4) / 2;

        if ($GPA_2 >= 93 && $GPA_2 <= 100) {
            $score->gpa_quarter_2 = "A";
            $score->pts_2 = $score->subject->credit*4;
        } elseif ($GPA_2 >= 90 && $GPA_2 <= 92) {
            $score->gpa_quarter_2 = "A-";
            $score->pts_2 = $score->subject->credit*3.70;
        } elseif ($GPA_2 >= 87 && $GPA_2 <= 89) {
            $score->gpa_quarter_2 = "B+";
            $score->pts_2 = $score->subject->credit*3.30;
        } elseif ($GPA_2 >= 83 && $GPA_2 <= 86) {
            $score->gpa_quarter_2 = "B";
            $score->pts_2 = $score->subject->credit*3.00;
        } elseif ($GPA_2 >= 80 && $GPA_2 <= 82) {
            $score->gpa_quarter_2 = "B-";
            $score->pts_2 = $score->subject->credit*2.70;
        } elseif ($GPA_2 >= 77 && $GPA_2 <= 79) {
            $score->gpa_quarter_2 = "C+";
            $score->pts_2 = $score->subject->credit*2.30;
        } elseif ($GPA_2 >= 73 && $GPA_2 <= 76) {
            $score->gpa_quarter_2 = "C";
            $score->pts_2 = $score->subject->credit*2.00;
        } elseif ($GPA_2 >= 70 && $GPA_2 <= 72) {
            $score->gpa_quarter_2 = "C-";
            $score->pts_2 = $score->subject->credit*1.70;
        } elseif ($GPA_2 >= 67 && $GPA_2 <= 69) {
            $score->gpa_quarter_2 = "D+";
            $score->pts_2 = $score->subject->credit*1.30;
        } elseif ($GPA_2 >= 63 && $GPA_2 <= 66) {
            $score->gpa_quarter_2 = "D";
            $score->pts_2 = $score->subject->credit*1.00;
        } elseif ($GPA_2 >= 60 && $GPA_2 <= 62) {
            $score->gpa_quarter_2 = "D-";
            $score->pts_2 = $score->subject->credit*0.70;
        } elseif ($GPA_2 >= 0 && $GPA_2 <= 59) {
            $score->gpa_quarter_2 = "F";
            $score->pts_2 = $score->subject->credit*0.0;
        } else {
            $error = "invalid input";
        }

        $score->save();

        Session::flash('success', 'You have successfully update your student score');

        return redirect()->route('teacher.score.view', ['teacher_id'=>$teacher->id, 'grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }


    public function showAssignment($teacher_id){

        $teacher = Teacher::findOrFail($teacher_id);

        $assignment = Assignment::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.assignment.show_assignment')
            ->with(['assignment'=> $assignment, 'teacher'=>$teacher]);
    }

    //view student by Grade
    public function viewByGrade($teacher_id){
        $teacher = Teacher::find($teacher_id);
        $grade_profile_id = $teacher->grade_profile_id;

        

            $viewByGrade = GradeProfile::find($grade_profile_id);
            return view('admin.student.view_by_grade')->with([
            'viewByGrade'=>$viewByGrade,
            'teacher'=>$teacher,
            
            ]);
        
       
        
         
     }

    //view all students but not score
    
    public function viewAllStudents($teacher_id){

        $student = StudentProfile::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->orderBy('grade_profile_id', 'ASC')
            ->paginate(10);

        $teacher = Teacher::find($teacher_id);    

        return view('admin.student.view_allStudent_byTeacher')
            ->with(['student'=>$student, 'teacher'=>$teacher]);

    } 




     public function StudentByGrade($grade_profile_id, $teacher_id){

        $teacher = Teacher::findOrFail($teacher_id);
        $viewStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id])->orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
        $countStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id])->count();
        $countMaleStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id, 'gender'=>'Male'])->count();
        $countFemaleStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id, 'gender'=>'Female'])->count();


  
        return view('admin.student.view_allStudent_byGrade')->with([
            'viewStudentByGrade'=>$viewStudentByGrade,
            'countStudentByGrade'=>$countStudentByGrade,
            'countMaleStudentByGrade'=>$countMaleStudentByGrade,
            'countFemaleStudentByGrade'=>$countFemaleStudentByGrade,
   
            'teacher'=>$teacher
        ]);

        

       
    }

    //change password of teacher

    public function changePassword($teacher_id){
        $teacher = Teacher::findOrFail($teacher_id);
        return view('admin.teacher.changePassword')->with('teacher', $teacher);
    }

    //change password method

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Teacher::findOrFail(Auth::user()->id);

        if (Hash::check(Input::get('oldPassword'), $admin['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $admin->password = bcrypt(Input::get('password'));
            $admin->save();

            Session::flash('success', 'Password changed successfully!');
            return redirect('/teacher');
        } else {
            Session::flash('error', 'Your current password not match! Try Again');
            return redirect()->back();
        }
    }

       //search student

    public function searchStudent($teacher_id){
        $teacher = Teacher::findOrFail($teacher_id);
        $student = StudentProfile::where('card_id','like', '%'. request('query') .  '%')
            ->orWhere('first_name','like', '%'. request('query') .  '%')
            ->orWhere('last_name','like', '%'. request('query') .  '%')
            ->orWhere('father_phone','like', '%'. request('query') .  '%')
            ->orWhere('mother_phone','like', '%'. request('query') .  '%')
            ->paginate(10);
        return view('search.teacher_search_result')->with('student', $student)->with('teacher', $teacher)
            ->with('studentName', 'Search results :' .request('query'));
    }

    public function viewStaff($teacher_id)
    {
        $teacher = Teacher::findOrFail($teacher_id);

        $staff = Staff::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
    	return view('admin.staff.show_staff')->with('staff', $staff)->with('teacher', $teacher);
    }

    public function staffDetail($teacher_id, $staff_id)
    {
        $staff = Staff::findOrFail($staff_id);
        $teacher = Teacher::findOrFail($teacher_id);
        return view('admin.staff.staff_detail')->with('staff', $staff)->with('teacher', $teacher);
        
    }

    public function showAllTeacher($teacher_id)
    {
        $teacher = Teacher::findOrFail($teacher_id);
        $teacherAll = Teacher::orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC')->get();
    	return view('admin.teacher.all_teacher')->with('teacherAll', $teacherAll)->with('teacher', $teacher);
    }

    






}
