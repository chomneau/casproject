<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentProfile;
use App\Grade;
use App\KLevel;
use App\Score;
use App\SecondaryLevel;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Illuminate\Support\Facades\Input;


use App\PrimarySubject;
use View;
use App\PrekScore;
use App\KSubject;
use App\GradeProfile;
use App\DayPresent;
use App\PrekAbsent;

class PrekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->grade = Grade::orderBy('grade_name', 'asc')->get();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::orderBy('name', 'asc')->get();
        View::share('kgrade', $this->kgrade);


        $this->secondaryGrade = SecondaryLevel::orderBy('name', 'asc')->get();
        View::share('secondaryGrade', $this->secondaryGrade);


        $this->subject = Subject::all();
        View::share('subject', $this->subject);
        
        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);
    }

    

//score for k and pre_k 

    public function prekScore($grade_id, $student_id)
    {
        $prekScore = PrekScore::where([
            ['student_profile_id', $student_id],
            ['k_level_id', $grade_id],
        ])->get();
        $gradeId = KLevel::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);

        return view('admin.student.pre_school.preschool_score_view')
            ->with([
                'grade_id' => $gradeId,
                'prekScores' => $prekScore,
                'students' => $student,
            ]);

    }
    //add subject to prekScore table show form
    public function showPrekAddSubject($grade_id, $student_id)
    {
        $subject = KSubject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);
        return view('admin.student.pre_school.preschool_add_subject_to_grade')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade
            ]);
    }

    //show all subject to add_subject prekScore table show form
    public function showAllPrekSubject($grade_id, $student_id)
    {
        $subject = KSubject::where('grade_id', $grade_id)->get();
        $countSubject = $subject->count();
        $student = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);
        return view('admin.student.pre_school.preschool_add_allsubject_to_grade')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade,
                'countSubject'=>$countSubject
            ]);
    }

    //insert all subject to prekscore table
    public function insertAllPrekSubject(Request $request, $grade_id, $student_id){

        $studentprofile = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);

        $input = Input::all();
        foreach ($input['subject_id'] as $index=>$value) {
            $score = new PrekScore();
            $score->student_profile_id = $studentprofile->id;
            $score->k_level_id = $grade->id;
            $score->k_subject_id = $value;
            $score->subject_code = $request->subject_code[$index];
            $score->save();
        }

        $day_present = DayPresent::all();


        $prekAbsent_quarter_1 = new PrekAbsent();
        $prekAbsent_quarter_1->student_profile_id = $studentprofile->id;
        $prekAbsent_quarter_1->k_level_id = $grade->id;
        $prekAbsent_quarter_1->reason = "non-count-daypresent";       
        $prekAbsent_quarter_1->quarter_name = $day_present[0]->quarter_name;
        $prekAbsent_quarter_1->quarter_day_present = $day_present[0]->quarter_day_present;
        $prekAbsent_quarter_1->absent_type = "non-count";
        $prekAbsent_quarter_1->absent_date = date("Y-m-d");
        $prekAbsent_quarter_1->save();

        $prekAbsent_quarter_2 = new PrekAbsent();
        $prekAbsent_quarter_2->student_profile_id = $studentprofile->id;
        $prekAbsent_quarter_2->k_level_id = $grade->id;
        $prekAbsent_quarter_2->reason = "non-count-daypresent";
        $prekAbsent_quarter_2->absent_type = "non-count";
        $prekAbsent_quarter_2->quarter_name = $day_present[1]->quarter_name;
        $prekAbsent_quarter_2->quarter_day_present = $day_present[1]->quarter_day_present;
        $prekAbsent_quarter_2->absent_date = date("Y-m-d");
        $prekAbsent_quarter_2->save();

        $prekAbsent_quarter_3 = new PrekAbsent();
        $prekAbsent_quarter_3->student_profile_id = $studentprofile->id;
        $prekAbsent_quarter_3->k_level_id = $grade->id;
        $prekAbsent_quarter_3->reason = "non-count-daypresent";
        $prekAbsent_quarter_3->absent_type = "non-count";
        $prekAbsent_quarter_3->quarter_name = $day_present[2]->quarter_name;
        $prekAbsent_quarter_3->quarter_day_present = $day_present[2]->quarter_day_present;
        $prekAbsent_quarter_3->absent_date = date("Y-m-d");
        $prekAbsent_quarter_3->save();

        $prekAbsent_quarter_4 = new PrekAbsent();
        $prekAbsent_quarter_4->student_profile_id = $studentprofile->id;
        $prekAbsent_quarter_4->k_level_id = $grade->id;
        $prekAbsent_quarter_4->reason = "non-count-daypresent";
        $prekAbsent_quarter_4->absent_type = "non-count";
        $prekAbsent_quarter_4->quarter_name = $day_present[3]->quarter_name;
        $prekAbsent_quarter_4->quarter_day_present = $day_present[3]->quarter_day_present;
        $prekAbsent_quarter_4->absent_date = date("Y-m-d");
        $prekAbsent_quarter_4->save();

            Session::flash('success', 'You have successfully inserted your student score');
            return redirect()->route('prekschool.score', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }


    //add subject to table

    public function prekAddSubject(Request $request, $grade_id, $student_id)
    {

        $studentprofile = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);
        $score = new PrekScore();
        $score->student_profile_id = $studentprofile->id;
        $score->k_level_id = $grade->id;
        $score->k_subject_id = $request->subject_id;

        $score->save();

        Session::flash('success', 'You have successfully inserted your student score');
        return redirect()->route('prekschool.score', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }

    //Edit PrekScore table
    public function editPrekScoreForm($score_id, $grade_id, $student_id)
    {

        $score = PrekScore::find($score_id);

        $student = StudentProfile::find($student_id);
        $grade = KLevel::find($grade_id);

        return view('admin.student.pre_school.edit_preschool_score')->with([
            'scores' => $score,
            'students' => $student,
            'grade_id' => $grade
        ]);

    }
//update recode of prekscore
 //   public function updatePrekScore(Request $request, $score_id, $grade_id, $student_id)
    public function updatePrekScore(Request $request)
    {

        PrekScore::find($request->pk)->update([$request->name => $request->value]);

        return response()->json(['success'=>'done']);
        
    //     $grade = KLevel::find($grade_id);
    //     $studentprofile = StudentProfile::find($student_id);

    //     $score = PrekScore::find($score_id);


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

	// 	//$sem_1 = $score->semester_1;
	// 	//$sem_2 = $score->semester_2;


    //     if ($score->semester_1 == 0 || $score->semester_2 == 0) {
    //         $score->yearly = 0;
    //     } else {

    //         $yearly = ($score->semester_1 + $score->semester_2) / 2;
    //         $score->yearly = $yearly;
    //     }



    //     $score->save();

    //     Session::flash('success', 'You have successfully update your student score');

    //     return redirect()->route('prekschool.score', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }

    //deleted subject from PrekScore
    public function destroyPrekScore($id)
    {
        $deleteScore = PrekScore::find($id);
        $deleteScore->delete();
        Session::flash('success', 'You have successfully delete score from student');
        return redirect()->back();

    }

    //update score in Prek and Grade K to make approval to to students
    public function updatePrekApproveScore(Request $request, $grade_profile_id){
        $input = $request->all();
       
        
        $studentID = $input['studentID'];
        $gradeID = $input['kgrade'];
        $quarter = $input['quarter_name'];
        $approveRadio = $input['approve_radio'];

        

        
        $grade_profile_id = GradeProfile::find($grade_profile_id);
        

        $prekGradeKApproveScore = PrekScore::where(['k_level_id'=>$gradeID])->whereIn('student_profile_id', $studentID)->get();
        

        if($approveRadio == 'approve_score'){
            if($quarter == 'quarter_1'){

                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q1 = 1;
                    $updateScore->save();
                }
            }elseif($quarter == 'quarter_2'){
                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q2 = 1;
                    $updateScore->save();
                }
            
            }elseif($quarter == 'quarter_3'){
                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q3 = 1;
                    $updateScore->save();
                }
            

            }elseif($quarter == 'quarter_4'){
                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q4 = 1;
                    $updateScore->save();
                }
            }
        }elseif($approveRadio == 'unapprove_score'){
            if($quarter == 'quarter_1'){

                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q1 = 0;
                    $updateScore->save();
                }
            }elseif($quarter == 'quarter_2'){
                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q2 = 0;
                    $updateScore->save();
                }
            
            }elseif($quarter == 'quarter_3'){
                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q3 = 0;
                    $updateScore->save();
                }
            

            }elseif($quarter == 'quarter_4'){
                foreach($prekGradeKApproveScore as $scoreID){
                    $updateScore = PrekScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q4 = 0;
                    $updateScore->save();
                }
            }
        }



        $prekGradeKApproveScore = PrekScore::where(['k_level_id'=>$gradeID])->whereIn('student_profile_id', $studentID)->get();
        
        return view('admin.student.approve_score.approve_score_prek_gradeK')->with([
            'studentScore' => $prekGradeKApproveScore,
            'grade_profile_id' => $grade_profile_id,
            

        ]);
    }







}


