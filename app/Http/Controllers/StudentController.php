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


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth:admin');
        
        

        $this->grade = Grade::orderBy('id', 'asc')->get();
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

        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);

        $this->daypresent = DayPresent::all();
        View::share('daypresent', $this->daypresent);
    }



    //show all students

    public function viewStudent()
    {
        $student = StudentProfile::orderBy('last_name','ASC')->orderBy('first_name', 'ASC')
            ->paginate(20);

       // $grade = Grade::all();

        return view('admin.student.view_all_student')
            ->with('student', $student);
           // ->with('grade', $grade)

    }

    //view student by Grade
    public function viewByGrade(){

       $viewByGrade = GradeProfile::orderBy('order', 'asc')->get();

        return view('admin.student.view_by_grade')->with([
           'viewByGrade'=>$viewByGrade,
           ]);
    }

    public function viewAllStudentByGrade($grade_profile_id){
        $viewStudentByGrade = StudentProfile::where(['grade_profile_id'=>$grade_profile_id])->OrderBy('last_name', 'asc')->OrderBy('first_name', 'asc')->get();

    
        $gradeID = StudentProfile::find($grade_profile_id);
        $countStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id])->count();
        $countMaleStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id, 'gender'=>'Male'])->count();
        $countFemaleStudentByGrade = StudentProfile::withCount('GradeProfile')->where(['grade_profile_id'=>$grade_profile_id, 'gender'=>'Female'])->count();

        $grade = StudentProfile::find($grade_profile_id);

      //  return $countStudentByGrade->count();
        return view('admin.student.view_allStudent_byGrade')->with([
            'viewStudentByGrade'=>$viewStudentByGrade,
            'countStudentByGrade'=>$countStudentByGrade,
            'countMaleStudentByGrade'=>$countMaleStudentByGrade,
            'countFemaleStudentByGrade'=>$countFemaleStudentByGrade,
            'grade'=>$grade,
            'gradeID'=>$gradeID,
            //'student_ID'=>$student_ID,
            
        ]);
    }

    //approve Student Score for High School

    public function approveByGrade($gradeID){

        $viewStudentByGrade = StudentProfile::where(['grade_profile_id'=>$gradeID])->OrderBy('last_name', 'asc')->OrderBy('first_name', 'asc')->get();
        
        $countStudent = $viewStudentByGrade->count();

        $grade_profile_id = GradeProfile::find($gradeID);
        
        // $studentid = StudentProfile::find($student_ID)->get();

        foreach($viewStudentByGrade as $student){
            $st[] = $student->id; 
        }
        //return $st;
        

        //return $viewStudentByGrade;

        $studentprofile = Score::where(['grade_id'=>$gradeID])->whereIn('student_profile_id', $st)->get();
        return view('admin.student.approve_score.approve_by_grade')->with([
            'studentprofile'=> $studentprofile,
            'studentID'=> $st,
            'grade_profile_id'=>$grade_profile_id
            ]);
    }

    //update score in highschool to make approval to to students
    public function updateHighschoolApproveScore(Request $request, $grade_profile_id){
        $input = $request->all();

        
        $studentID = $input['studentID'];
        $gradeID = $input['grade'];
        $quarter = $input['quarter_name'];
        $approveRadio = $input['approve_radio'];

        
        $grade_profile_id = GradeProfile::find($grade_profile_id);
        

        $highSchoolApproveScore = Score::where(['grade_id'=>$gradeID])->whereIn('student_profile_id', $studentID)->get();

        if($approveRadio == 'approve_score'){
            if($quarter == 'quarter_1'){

                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q1 = 1;
                    $updateScore->save();
                }
            }elseif($quarter == 'quarter_2'){
                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q2 = 1;
                    $updateScore->save();
                }
            
            }elseif($quarter == 'quarter_3'){
                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q3 = 1;
                    $updateScore->save();
                }
            

            }elseif($quarter == 'quarter_4'){
                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q4 = 1;
                    $updateScore->save();
                }
            }
        }elseif($approveRadio == 'unapprove_score'){
            if($quarter == 'quarter_1'){

                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q1 = 0;
                    $updateScore->save();
                }
            }elseif($quarter == 'quarter_2'){
                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q2 = 0;
                    $updateScore->save();
                }
            
            }elseif($quarter == 'quarter_3'){
                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q3 = 0;
                    $updateScore->save();
                }
            

            }elseif($quarter == 'quarter_4'){
                foreach($highSchoolApproveScore as $scoreID){
                    $updateScore = Score::findOrFail($scoreID->id);
                    $updateScore->approve_score_q4 = 0;
                    $updateScore->save();
                }
            }
        }



        $highSchoolApproveScore = Score::where(['grade_id'=>$gradeID])->whereIn('student_profile_id', $studentID)->get();
        
        return view('admin.student.approve_score.approve_score_highschool')->with([
            'studentScore' => $highSchoolApproveScore,
            'grade_profile_id' => $grade_profile_id,

        ]);
    }



    //view student detail
    public function studentDetail($id)
    {
        $student = StudentProfile::find($id);
       // $absentRecord = AbsentRecord::find($absentRecord_id)
        return view('admin.student.student_detail')
            ->with([
                'students'=>$student, 
               // 'absentRecord'=>$absentRecord 
                ]);
    }

    //view student detail
    public function studentScore($id)
        {
            $student = StudentProfile::find($id);
           // $absentRecord = AbsentRecord::find($absentRecord_id)
            return view('admin.student.student_score')
                ->with([
                    'students'=>$student, 
                   // 'absentRecord'=>$absentRecord 
                    ]);
        }

    //query subjects
    public function SubjectByGrade($grade_id, $student_id)
    {
        $subject = Subject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        return view('admin.student.high_school.add_subject_tograde')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade
            ]);
    }
    //show all subject form to add to score table for high school student
    public function showHighScoreForm($grade_id, $student_id)
    {
        $subject = Subject::where('grade_id', $grade_id)->orderBy('name','ASC')->get();
        $student = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        return view('admin.student.high_school.add_all_subject_to_highschool_form')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade
            ]);
    }

    public function viewScore($grade_id, $student_id)
    {
        $score = Score::where([
            ['student_profile_id', $student_id],
            ['grade_id', $grade_id],
        ])->get();
        $gradeId = Grade::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);
       
        return view('admin.student.high_school.index_highschool')
            ->with([
                'grade_id' => $gradeId,
                'scores' => $score,
                'students' => $student,
            ]);
    }

 



    public function insertScore(Request $request, $student_id, $grade_id)
    {
        $studentprofile = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        $score = new Score();
        $score->student_profile_id = $studentprofile->id;
        $score->grade_id = $grade->id;
        $score->subject_id = $request->subject_id;

        $score->save();
        Session::flash('success', 'You have successfully inserted your student score');
        //return redirect()->back();
        return redirect()->route('score.view', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }
    
    //insert all subject to score table for high school student
    public function insertAllSubjectsToScore(Request $request, $student_id, $grade_id)
    {
        $studentprofile = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);
        $input = Input::all();
        foreach ($input['subject_id'] as $index=>$value){
            $score = new Score();
            $score->student_profile_id = $studentprofile->id;
            $score->grade_id = $grade->id;
            $score->subject_id = $value;
            $score->save();
        }

        $day_present = DayPresent::all();

        $highSchoolAbsent_quarter_1 = new AbsentRecord();
        $highSchoolAbsent_quarter_1->student_profile_id = $studentprofile->id;
        $highSchoolAbsent_quarter_1->grade_id = $grade->id;
        $highSchoolAbsent_quarter_1->reason = "non-count-daypresent";
        
        $highSchoolAbsent_quarter_1->quarter_name = $day_present[0]->quarter_name;
        $highSchoolAbsent_quarter_1->quarter_day_present = $day_present[0]->quarter_day_present;

        $highSchoolAbsent_quarter_1->absent_type = "non-count";

        $highSchoolAbsent_quarter_1->absent_date = date("Y-m-d");
        $highSchoolAbsent_quarter_1->save();

        $highSchoolAbsent_quarter_2 = new AbsentRecord();
        $highSchoolAbsent_quarter_2->student_profile_id = $studentprofile->id;
        $highSchoolAbsent_quarter_2->grade_id = $grade->id;
        $highSchoolAbsent_quarter_2->reason = "non-count-daypresent";
        $highSchoolAbsent_quarter_2->absent_type = "non-count";
        $highSchoolAbsent_quarter_2->quarter_name = $day_present[1]->quarter_name;
        $highSchoolAbsent_quarter_2->quarter_day_present = $day_present[1]->quarter_day_present;
        $highSchoolAbsent_quarter_2->absent_date = date("Y-m-d");
        $highSchoolAbsent_quarter_2->save();

        $highSchoolAbsent_quarter_3 = new AbsentRecord();
        $highSchoolAbsent_quarter_3->student_profile_id = $studentprofile->id;
        $highSchoolAbsent_quarter_3->grade_id = $grade->id;
        $highSchoolAbsent_quarter_3->reason = "non-count-daypresent";
        $highSchoolAbsent_quarter_3->absent_type = "non-count";
        $highSchoolAbsent_quarter_3->quarter_name = $day_present[2]->quarter_name;
        $highSchoolAbsent_quarter_3->quarter_day_present = $day_present[2]->quarter_day_present;
        $highSchoolAbsent_quarter_3->absent_date = date("Y-m-d");
        $highSchoolAbsent_quarter_3->save();

        $highSchoolAbsent_quarter_4 = new AbsentRecord();
        $highSchoolAbsent_quarter_4->student_profile_id = $studentprofile->id;
        $highSchoolAbsent_quarter_4->grade_id = $grade->id;
        $highSchoolAbsent_quarter_4->reason = "non-count-daypresent";
        $highSchoolAbsent_quarter_4->absent_type = "non-count";
        $highSchoolAbsent_quarter_4->quarter_name = $day_present[3]->quarter_name;
        $highSchoolAbsent_quarter_4->quarter_day_present = $day_present[3]->quarter_day_present;
        $highSchoolAbsent_quarter_4->absent_date = date("Y-m-d");
        $highSchoolAbsent_quarter_4->save();




        Session::flash('success', 'You have successfully inserted all subject to student');
        //return redirect()->back();
        return redirect()->route('score.view', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }

    //Edit student score
    public function editScore($score_id, $grade_id, $student_id)
    {

        $score = Score::find($score_id);

        $student = StudentProfile::find($student_id);
        $grade = Grade::find($grade_id);

        return view('admin.student.high_school.edit_score_highschool')->with([
            'scores' => $score,
            'students' => $student,
            'grade_id' => $grade
        ]);

    }

    //deleted subject from student
    public function destroyScore($id)
    {
        $deleteScore = Score::find($id);
        $deleteScore->delete();
        Session::flash('success', 'You have successfully delete score from student');
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $idS
     * @return \Illuminate\Http\Response
     */
    public function updateScore(Request $request, $score_id, $grade_id, $student_id)
    {
        $grade = Grade::find($grade_id);
        $studentprofile = StudentProfile::find($student_id);

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

        Session::flash('success', 'You have successfully update your student score');

        return redirect()->route('score.view', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     **/

    public function showRegisterForm()
    {
        return view('admin.student.studentRegister');
    }

    public function studentRegister(Request $request)
    {

        $this->validate($request, [
            //validate for company table
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'student_id' => 'required',
            'nationality' => 'required',
            //'father_name' => 'required',
            //'father_phone' => 'required',
           // 'address' => 'required',
        ]);

        $user = new User();

        $user->name = $request->first_name;
        $user->email = $request->student_id."@cas.edu.kh";
        $user->password = bcrypt($request->student_id);
        $user->student_id = $request->student_id;

        $user->save();

        //$user = Auth::user();
        $student = new StudentProfile();
        //upload image for user
        $student->photo = 'uploads/photo/1510817755img.png';
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->date_of_birth;
        $student->place_of_birth = $request->place_of_birth;
        $student->card_id = $request->student_id;
        $student->grade_profile_id = $request->grade_id;
        $student->nationality = $request->nationality;
        $student->status = $request->status;
        $student->start_date = $request->start_date;
        $student->progressive_book_id = $request->progressive_book_id;


        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;

        $student->father_phone = $request->father_phone;
        $student->mother_phone = $request->mother_phone;

        $student->father_occupation = $request->father_occupation;
        $student->mother_occupation = $request->mother_occupation;


        
        $student->father_email = $request->father_email;
        $student->mother_email = $request->mother_email;


        $student->address = $request->address;
        $student->user_id = $user->id;
        $student->save();

        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . $photo->getClientOriginalName();
            $photo->move('uploads/photo', $photo_new_name);
            $student->photo = 'uploads/photo/' . $photo_new_name;
            $student->save();
        }

        Session::flash('success', 'You successfully create a student profile');
        return redirect('admin/student/viewStudent');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStudent($id)
    {
        $student = StudentProfile::find($id);
        return view('admin.student.edit_student')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(Request $request, $id)
    {
        $this->validate($request, [
            //validate for company table
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'student_id' => 'required',
            'nationality' => 'required',
            //'address' => 'required',
        ]);

        //$user = Auth::user();
        $student = StudentProfile::find($id);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->date_of_birth;
        $student->place_of_birth = $request->place_of_birth;
        $student->card_id = $request->student_id;
        $student->grade_profile_id = $request->grade_id;
        $student->nationality = $request->nationality;
        $student->status = $request->status;
        $student->start_date = $request->start_date;
        $student->progressive_book_id = $request->progressive_book_id;

        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;

        $student->father_phone = $request->father_phone;
        $student->mother_phone = $request->mother_phone;

        $student->father_occupation = $request->father_occupation;
        $student->mother_occupation = $request->mother_occupation;

        
        $student->father_email = $request->father_email;
        $student->mother_email = $request->mother_email;
        $student->address = $request->address;
       // $student->user_id = $user->id;
        $student->save();

        $user = StudentProfile::find($id)->user;
        $user->name = $request->first_name;
        $user->student_id = $request->student_id;
        
        $user->save();

        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . $photo->getClientOriginalName();
            $photo->move('uploads/photo', $photo_new_name);
            $student->photo = 'uploads/photo/' . $photo_new_name;
            $student->save();
        }


        Session::flash('success', 'You successfully update a student profile');
        //return redirect('admin/student/detail', ['id'=>$student->id]);
        return redirect()->route('student.detail', ['id' => $student->id]);

    }

    /**
     * Remove the specified resource from storage
     * @param  int  $id
     * @return \Illuminate\Http\Response
     **/

    public function deleteStudent($id)
    {
        $student = StudentProfile::find($id);
        $student->delete();
        Session::flash('success', 'You successfully Deleted a Grade!');
        return redirect()->back();
    }

    //change student password

    public function changeStudentPassword(Request $request, $student_id){

        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $student = StudentProfile::find($student_id);

        $user = user::find($student->user->id);

        if (Input::get('password') == Input::get('password_confirmation')) {
            
            $user->password = bcrypt(Input::get('password'));
            
            $user->save();

            Session::flash('success', 'Password changed successfully!');

            return redirect()->route('student.detail', ['id' => $student->id]);

        } else {
            Session::flash('error', 'password is not match! Try Again');
            return redirect()->back();
        }
    }

    public function passwordForm($student_id){

        $student = StudentProfile::find($student_id);
        
        return view('admin.student.changePassword')->with('students', $student);
    }

    //search student

    public function searchStudent(){
        $student = StudentProfile::where('card_id','like', '%'. request('query') .  '%')
            ->orWhere('first_name','like', '%'. request('query') .  '%')
            ->orWhere('last_name','like', '%'. request('query') .  '%')
            ->orWhere('father_phone','like', '%'. request('query') .  '%')
            ->orWhere('mother_phone','like', '%'. request('query') .  '%')
            ->paginate(10);
        return view('admin.student.search_student')->with('student', $student)
            ->with('studentName', 'Search results :' .request('query'));
    }












}

