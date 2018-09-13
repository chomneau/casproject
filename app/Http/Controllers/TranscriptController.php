<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentProfile;
use App\Score;
use App\Grade;
use View;
use App\KLevel;

use App\SecondaryLevel;
use App\Subject;
use App\PrekScore;
use App\SecondaryScore;

class TranscriptController extends Controller
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


    public function selectTranscript($student_id)
    {
        $student = StudentProfile::find($student_id);
       // $grade = Grade::find($grade_id);
        $score = score::where('student_profile_id', $student_id)->get();

        return view('admin.student.print.select_grade')
            ->with(['student' => $student, 'score' => $score]);
    }



    public function selectOption($student_id)
    {

        $student = StudentProfile::find($student_id);
        $grade = Grade::all();

        return view('admin.student.print.print_option')
            ->with(['students' => $student, 'grade' => $grade]);

    }


    //print view for K and Prek

    public function prekPrintView(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('kgrade');

        $kscore = PrekScore::where('student_profile_id', $student_id)
        ->whereIn('k_level_id', $checked_id)->get();

        return view('admin.student.print.prek_yearly_report')
                    ->with([

                        'kscore'=>$kscore,
                        'student'=>$student,
                    ]);
        


    }

    //print view primary and secondary school
    public function secondarySchoolPrintView(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('secondaryGrade');

        $secondaryscore = secondaryScore::where('student_profile_id', $student_id)
        ->whereIn('secondary_level_id', $checked_id)->get();

        return view('admin.student.print.secondary_yearly_report')
                    ->with([

                        'secondaryscore'=>$secondaryscore,
                        'student'=>$student,
                    ]);


    }

//select transcript option
    public function transcript($student_id){

        $student = StudentProfile::find($student_id);
        $grade = Grade::all();

        return view('admin.student.print.transcript')
            ->with(['students' => $student, 'grade' => $grade]);

    }



    //High school transcript
    public function highSchoolPrintView(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('grade');

        

        $semester_1 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->orderBy('grade_id', 'ASC')->get();


        

        $credit = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('credit');

        $sum_pts_1 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('pts_1');

        $sum_pts_2 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('pts_2');



        //  $date = Score::where('student_profile_id', $student_id)
        // ->where([ ['grade_id', $checked_id], ['semester', 2] ])->first();


        

        return view('admin.student.print.high_school_print_view')
        ->with([
            'semester_1'=>$semester_1,
            'student'=>$student,
            'credit'=>$credit,
            'sum_pts_1'=>$sum_pts_1,
            'sum_pts_2'=>$sum_pts_2
            
        ]);
        


    }


//Yearly report for High School



public function yearlyReportHighSchool(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('grade');

        

        $semester_1 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->orderBy('grade_id', 'ASC')->get();


        

        $sum_pts_1 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('pts_1');

        $sum_pts_2 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('pts_2');



        //  $date = Score::where('student_profile_id', $student_id)
        // ->where([ ['grade_id', $checked_id], ['semester', 2] ])->first();


        

        return view('admin.student.print.yearly_report_highschool.yearly_report_highschool')
        ->with([
            'semester_1'=>$semester_1,
            'student'=>$student,
            'sum_pts_1'=>$sum_pts_1,
            'sum_pts_2'=>$sum_pts_2
            
        ]);
        


    }





















}
