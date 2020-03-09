<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\KLevel;
use App\SecondaryLevel;
use App\Subject;
use App\StudentProfile;
use Session;
use App\SecondaryScore;

use App\PrimarySubject;
use View;
use App\GradeProfile;
use App\SecondaryAbsent;
use App\DayPresent;
use Illuminate\Support\Facades\Input;

class SecondaryController extends Controller
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



    public function secondaryScore($grade_id, $student_id)
    {
        $secondaryScore = SecondaryScore::where([
            ['student_profile_id', $student_id],
            ['secondary_level_id', $grade_id],
        ])->get();
        $gradeId = SecondaryLevel::find($grade_id);
       // $score = Score::all();
        $student = StudentProfile::find($student_id);

        return view('admin.student.secondary_school.secondary_score_view')
            ->with([
                'grade_id' => $gradeId,
                'secondaryScores' => $secondaryScore,
                'students' => $student,
            ]);

    }

    //add subject to score table show form
    public function showSecondaryAddSubject($grade_id, $student_id)
    {
        $subject = PrimarySubject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);
        return view('admin.student.secondary_school.secondary_add_subject_to_grade')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade
            ]);
    }

    //add subject to score table show form
    public function showSecondaryAddAllSubject($grade_id, $student_id)
    {
        $subject = PrimarySubject::where('grade_id', $grade_id)->get();
        $student = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);
        return view('admin.student.secondary_school.secondary_add_all_subject_form')
            ->with([
                'subjects' => $subject,
                'students' => $student,
                'grade_id' => $grade
            ]);
    }

//add subject to table

    public function secondaryAddSubject(Request $request, $grade_id, $student_id)
    {
        $studentprofile = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);
        $score = new SecondaryScore();
        $score->student_profile_id = $studentprofile->id;
        $score->secondary_level_id = $grade->id;
        $score->primary_subject_id = $request->subject_id;

        $score->save();

       //echo "done";

        Session::flash('success', 'You have successfully inserted your student score');
        //return redirect()->back();
        return redirect()->route('score.secondary', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }

    public function secondaryInsertAllSubject(Request $request, $grade_id, $student_id)
    {
        $studentprofile = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);

        $input = Input::all();
        foreach ($input['subject_id'] as $index=>$value) {
            $score = new SecondaryScore();
            $score->student_profile_id = $studentprofile->id;
            $score->secondary_level_id = $grade->id;
            $score->primary_subject_id = $value;

            $score->save();
        }
    //insert absent record with non-count of absent_type to Secondary_Absent table to get default day_present in the yarly report

    $day_present = DayPresent::all();

    $secondaryAbsent_quarter_1 = new SecondaryAbsent();
    $secondaryAbsent_quarter_1->student_profile_id = $studentprofile->id;
    $secondaryAbsent_quarter_1->secondary_level_id = $grade->id;
    $secondaryAbsent_quarter_1->reason = "non-count-daypresent";   
    $secondaryAbsent_quarter_1->quarter_name = $day_present[0]->quarter_name;
    $secondaryAbsent_quarter_1->quarter_day_present = $day_present[0]->quarter_day_present;
    $secondaryAbsent_quarter_1->absent_type = "non-count";
    $secondaryAbsent_quarter_1->absent_date = date("Y-m-d");
    $secondaryAbsent_quarter_1->save();

    $secondaryAbsent_quarter_2 = new SecondaryAbsent();
    $secondaryAbsent_quarter_2->student_profile_id = $studentprofile->id;
    $secondaryAbsent_quarter_2->secondary_level_id = $grade->id;
    $secondaryAbsent_quarter_2->reason = "non-count-daypresent";
    $secondaryAbsent_quarter_2->absent_type = "non-count";
    $secondaryAbsent_quarter_2->quarter_name = $day_present[1]->quarter_name;
    $secondaryAbsent_quarter_2->quarter_day_present = $day_present[1]->quarter_day_present;
    $secondaryAbsent_quarter_2->absent_date = date("Y-m-d");
    $secondaryAbsent_quarter_2->save();

    $secondaryAbsent_quarter_3 = new SecondaryAbsent();
    $secondaryAbsent_quarter_3->student_profile_id = $studentprofile->id;
    $secondaryAbsent_quarter_3->secondary_level_id = $grade->id;
    $secondaryAbsent_quarter_3->reason = "non-count-daypresent";
    $secondaryAbsent_quarter_3->absent_type = "non-count";
    $secondaryAbsent_quarter_3->quarter_name = $day_present[2]->quarter_name;
    $secondaryAbsent_quarter_3->quarter_day_present = $day_present[2]->quarter_day_present;
    $secondaryAbsent_quarter_3->absent_date = date("Y-m-d");
    $secondaryAbsent_quarter_3->save();

    $secondaryAbsent_quarter_4 = new SecondaryAbsent();
    $secondaryAbsent_quarter_4->student_profile_id = $studentprofile->id;
    $secondaryAbsent_quarter_4->secondary_level_id = $grade->id;
    $secondaryAbsent_quarter_4->reason = "non-count-daypresent";
    $secondaryAbsent_quarter_4->absent_type = "non-count";
    $secondaryAbsent_quarter_4->quarter_name = $day_present[3]->quarter_name;
    $secondaryAbsent_quarter_4->quarter_day_present = $day_present[3]->quarter_day_present;
    $secondaryAbsent_quarter_4->absent_date = date("Y-m-d");
    $secondaryAbsent_quarter_4->save();

        Session::flash('success', 'You have successfully inserted subject to your student');
        //return redirect()->back();
        return redirect()->route('score.secondary', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);
    }

    //Edit secondaryScore table
    public function editSecondaryScoreForm($score_id, $grade_id, $student_id)
    {

        $score = SecondaryScore::find($score_id);

        $student = StudentProfile::find($student_id);
        $grade = SecondaryLevel::find($grade_id);

        return view('admin.student.secondary_school.edit_secondary_score')->with([
            'scores' => $score,
            'students' => $student,
            'grade_id' => $grade
        ]);

    }

    // public function updateSecondaryScore(Request $request, $score_id, $grade_id, $student_id)

    public function updateSecondaryScore(Request $request)
    {
        SecondaryScore::find($request->pk)->update([$request->name => $request->value]);

        // $html = view('view_secondary_score', compact('view'))->render();

        

        return response()->json(['success'=>'done']);
        
    //     $grade = SecondaryLevel::find($grade_id);
    //     $studentprofile = StudentProfile::find($student_id);

    //     $score = SecondaryScore::find($score_id);


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

    //     return redirect()->route('score.secondary', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }

    //deleted subject from secondaryScore
    public function destroySecondaryScore($id)
    {
        $deleteScore = SecondaryScore::find($id);
        $deleteScore->delete();
        Session::flash('success', 'You have successfully delete score from student');
        return redirect()->back();

    }

       
    
//update score in secondary to make approval to to students
    public function updateSecondaryApproveScore(Request $request, $grade_profile_id){
        $input = $request->all();
       
        
        $studentID = $input['studentID'];
        $gradeID = $input['secondaryGrade'];
        $quarter = $input['quarter_name'];
        $approveRadio = $input['approve_radio'];

        

        
        $grade_profile_id = GradeProfile::find($grade_profile_id);
        

        $secondaryApproveScore = SecondaryScore::where(['secondary_level_id'=>$gradeID])->whereIn('student_profile_id', $studentID)->get();
        

        if($approveRadio == 'approve_score'){
            if($quarter == 'quarter_1'){

                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q1 = 1;
                    $updateScore->save();
                }
            }elseif($quarter == 'quarter_2'){
                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q2 = 1;
                    $updateScore->save();
                }
            
            }elseif($quarter == 'quarter_3'){
                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q3 = 1;
                    $updateScore->save();
                }
            

            }elseif($quarter == 'quarter_4'){
                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q4 = 1;
                    $updateScore->save();
                }
            }
        }elseif($approveRadio == 'unapprove_score'){
            if($quarter == 'quarter_1'){

                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q1 = 0;
                    $updateScore->save();
                }
            }elseif($quarter == 'quarter_2'){
                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q2 = 0;
                    $updateScore->save();
                }
            
            }elseif($quarter == 'quarter_3'){
                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q3 = 0;
                    $updateScore->save();
                }
            

            }elseif($quarter == 'quarter_4'){
                foreach($secondaryApproveScore as $scoreID){
                    $updateScore = SecondaryScore::findOrFail($scoreID->id);
                    $updateScore->approve_score_q4 = 0;
                    $updateScore->save();
                }
            }
        }



        $secondaryApproveScore = SecondaryScore::where(['secondary_level_id'=>$gradeID])->whereIn('student_profile_id', $studentID)->get();
        
        return view('admin.student.approve_score.approve_score_secondary')->with([
            'studentScore' => $secondaryApproveScore,
            'grade_profile_id' => $grade_profile_id,
            

        ]);
    }


}
