<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentProfile;
use App\Grade;
use App\KLevel;
use App\Score;
use App\SecondaryLevel;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;


use App\PrimarySubject;
use View;
use App\PrekScore;
use App\KSubject;

class PrekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->grade = Grade::all();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::all();
        View::share('kgrade', $this->kgrade);

        $this->secondaryGrade = SecondaryLevel::all();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->subject = Subject::all();
        View::share('subject', $this->subject);
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
    public function updatePrekScore(Request $request, $score_id, $grade_id, $student_id)
    {
        $grade = KLevel::find($grade_id);
        $studentprofile = StudentProfile::find($student_id);

        $score = PrekScore::find($score_id);


      //  return 'grade_id ='.$grade->id.'score ='.$score->id.'student ='.$studentprofile->id;

        $score->quarter_1 = $request->quarter1;
        $score->quarter_2 = $request->quarter2;
        $score->quarter_3 = $request->quarter3;
        $score->quarter_4 = $request->quarter4;

        if ($score->quarter_1 == 0 || $score->quarter_2 == 0) {

            $score->semester_1 = 0;

        } else {

            $GPA_1 = ($score->quarter_1 + $score->quarter_2) / 2;
            $score->semester_1 = $GPA_1;

        }

        if ($score->quarter_3 == 0 || $score->quarter_4 == 0) {

            $score->semester_2 = 0;

        } else {

            $GPA_2 = ($score->quarter_3 + $score->quarter_4) / 2;
            $score->semester_2 = $GPA_2;

        }

		//$sem_1 = $score->semester_1;
		//$sem_2 = $score->semester_2;


        if ($score->semester_1 == 0 || $score->semester_2 == 0) {
            $score->yearly = 0;
        } else {

            $yearly = ($score->semester_1 + $score->semester_2) / 2;
            $score->yearly = $yearly;
        }



        $score->save();

        Session::flash('success', 'You have successfully update your student score');

        return redirect()->route('prekschool.score', ['grade_id' => $grade->id, 'student_id' => $studentprofile->id]);

    }

    //deleted subject from secondaryScore
    public function destroyPrekScore($id)
    {
        $deleteScore = PrekScore::find($id);
        $deleteScore->delete();
        Session::flash('success', 'You have successfully delete score from student');
        return redirect()->back();

    }

















}
