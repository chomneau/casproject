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
use App\GradeProfile;


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

        $this->gradeProfile = GradeProfile::all();
        View::share('gradeProfile', $this->gradeProfile);

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

        //Personal Planning-Intellectual Development
        $PPI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PPI']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // English Language Arts-Intellectual Development
        $ELAI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'ELAI']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // Khmer Language Arts-Intellectual Development
        $KLAI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'KLAI']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // Mathematics-Intellectual Development
        $MI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MI']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // Social Studies-Intellectual Development
        $SSI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SSI']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // Science-Intellectual Development
        $SI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SI']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // Fine Arts-Aesthetic and Artistic Development
        $FAA = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'FAA']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // PEP : Physical Education-Physical Development
        $PEP = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PEP']] )
            ->whereIn('k_level_id', $checked_id)->get();

        // SRS : Physical Education-Physical Development
        $SRS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SRS']] )
             ->whereIn('k_level_id', $checked_id)->get();

        return view('admin.student.print.prek_yearly_report')
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



public function yearlyReportHighSchool(Request $request, $student_id)
{

    $student = StudentProfile::find($student_id);

    $checked_id = $request->input('grade');


    $semester_1 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->orderBy('grade_id', 'ASC')->get();


    $sum_pts_1 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->sum('pts_1');

    $sum_pts_2 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->sum('pts_2');


    //  $date = Score::where('student_profile_id', $student_id)
    // ->where([ ['grade_id', $checked_id], ['semester', 2] ])->first();


    return view('admin.student.print.yearly_report_highschool.yearly_report_highschool')
        ->with([
            'semester_1' => $semester_1,
            'student' => $student,
            'sum_pts_1' => $sum_pts_1,
            'sum_pts_2' => $sum_pts_2

        ]);
    }
        //CGPA transcript

    public function highSchoolCGPA( Request $request, $student_id){

    $checked_id = $request->input('grade');
    $student = StudentProfile::find($student_id);

    $collection = collect($checked_id);

    $grade_9 = $collection->slice(0,1); //get 1
    $grade_10 = $collection->slice(1,1); //get 2
    $grade_11 = $collection->slice(2,1); //get 3
    $grade_12 = $collection->slice(3,1); //get 4

    $score_grade_9 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_9)->get();
    $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();
    $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();
    $score_grade_12 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_12)->get();

        //Grade 9
            $credit_grade_9 = $score_grade_9->sum('credit');
    
            $sum_pts_1_grade_9 = $score_grade_9->sum('pts_1');
    
            $sum_pts_2_grade_9 = $score_grade_9->sum('pts_2');

            $cgpa_grade_9 = ($sum_pts_1_grade_9+$sum_pts_2_grade_9)/2;

            //grade 10

            $credit_grade_10 = $score_grade_10->sum('credit');
    
            $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
            $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

            $cgpa_grade_10 = ($sum_pts_1_grade_10+$sum_pts_2_grade_10)/2;


        // Grade 11
            $credit_grade_11 = $score_grade_11->sum('credit');
    
            $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
            $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');

            $cgpa_grade_11 = ($sum_pts_1_grade_11+$sum_pts_2_grade_11)/2;

        // Grade 12
            $credit_grade_12 = $score_grade_12->sum('credit');
    
            $sum_pts_1_grade_12 = $score_grade_12->sum('pts_1');
    
            $sum_pts_2_grade_12 = $score_grade_12->sum('pts_2');

            $cgpa_grade_12 = ($sum_pts_1_grade_12+$sum_pts_2_grade_12)/2;

        // Calulate CGPA
        
        $CGPA = ($cgpa_grade_9+$cgpa_grade_10+$cgpa_grade_11+$cgpa_grade_12)/4;
        //total all credit for student
        $total_credit = $credit_grade_9 + $credit_grade_10 + $credit_grade_11 + $credit_grade_12;

           // return $grade_9."-".$grade_10."-".$grade_11."-".$grade_12;
           // return $score_grade_11->Subject->name;

            // foreach($score_grade_11 as $score_grade_11s){
            //    return $score_grade_11s->subject->name;
            // }

            

    return view('admin.student.print.cgpa_transcript')->with([
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
        
























}
