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
use App\AbsentRecord;


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


    //print view for Prek

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

        return view('admin.student.print.report_card.prek_yearly_report')
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


    //print view for Grade k

    public function gradekPrintView(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('kgrade');

        $kscore = PrekScore::where('student_profile_id', $student_id)
        ->whereIn('k_level_id', $checked_id)->get();

        //SD : Spiritual Development
        $SD = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SD']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // PD : Personal/Social Development
        $PD = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PD']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // ART = Art
        $ART = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'ART']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // MUSIC: Music
        $MUSIC = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MUSIC']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // DERWS: Demontrantes emergent reading and writing skills(English section)
        $DERWS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'DERWS']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // EAWSS: Exhibits appropriate word study skills(English section)
        $EAWSS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'EAWSS']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // DERWS_KH : Demontrantes emergent reading and writing skills (Khmer Section)
        $DERWS_KH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'DERWS_KH']] )
            ->whereIn('k_level_id', $checked_id)->get();
        // EASWSS : Exhibits appropriate word study skills(Khmer section)
        $EAWSS_KH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'EAWSS_KH']] )
            ->whereIn('k_level_id', $checked_id)->get();

        // MATH : Mathematics (Refer to tracking card)
        $MATH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MATH']] )
             ->whereIn('k_level_id', $checked_id)->get();

        // PEDH : Physical Educe do / Health(Refer to tracking card)
        $PEDH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PEDH']] )
             ->whereIn('k_level_id', $checked_id)->get();
        // SCIENCE : Science
        $SCIENCE = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SCIENCE']] )
             ->whereIn('k_level_id', $checked_id)->get(); 

        // SS : Social Science
        $SS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SS']] )
             ->whereIn('k_level_id', $checked_id)->get();          


        return view('admin.student.print.report_card.gradeK_yearly_report')
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

                    ]);
        


    }

    //print view primary and secondary school
    public function secondarySchoolPrintView(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('secondaryGrade');

        $secondaryscore = secondaryScore::where('student_profile_id', $student_id)
        ->whereIn('secondary_level_id', $checked_id)->get();

        return view('admin.student.print.report_card.secondary_yearly_report')
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



        $sum_pts_1 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('pts_1');

        $sum_pts_2 = Score::where('student_profile_id', $student_id)
        ->where([ ['grade_id', $checked_id]])->sum('pts_2');

        $credit_grade = $semester_1->sum('credit')/2;

        if($credit_grade > 0 && $sum_pts_1 > 0 && $sum_pts_2){
            $total_credit = $credit_grade*2;
            $CGPA = ($sum_pts_1/$credit_grade + $sum_pts_2/$credit_grade)/2;
        }else{
            $CGPA = 0.00;
            $total_credit = 0.00;
        }

        

        return view('admin.student.print.cgpa.cgpa_highschool_by_grade')
        ->with([

            'semester_1'=>$semester_1,
            'student'=>$student,
            'credit_grade'=>$credit_grade,
            'sum_pts_1'=>$sum_pts_1,
            'sum_pts_2'=>$sum_pts_2,

            'CGPA'=>$CGPA,
            'total_credit'=>$total_credit,

            
        ]);
        


    }


//Yearly report for High School



public function yearlyReportHighSchool(Request $request, $student_id)
{

    $student = StudentProfile::find($student_id);

    $checked_id = $request->input('grade');

   // $absent = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)->count();


    $semester_1 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->orderBy('grade_id', 'ASC')->get();


    $sum_pts_1 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->sum('pts_1');

    $sum_pts_2 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->sum('pts_2');




    //  $date = Score::where('student_profile_id', $student_id)
    // ->where([ ['grade_id', $checked_id], ['semester', 2] ])->first();


    return view('admin.student.print.report_card.highschool_report_card')
        ->with([
            'semester_1' => $semester_1,
            'student' => $student,
            'sum_pts_1' => $sum_pts_1,
            'sum_pts_2' => $sum_pts_2,
            //'absent'=>$absent

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

            

    return view('admin.student.print.cgpa.cgpa_912_transcript')->with([
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

    //CGPA grade 9 to 10
    public function transcript910(Request $request, $student_id){

        $checked_id = $request->input('grade');
        $student = StudentProfile::find($student_id);

        $collection = collect($checked_id);

        $grade_9 = $collection->slice(0,1); //get 1
        $grade_10 = $collection->slice(1,1); //get 2
        

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

        

        return view('admin.student.print.cgpa.cgpa_910_transcript')->with([
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
    public function transcript911(Request $request, $student_id){

        $checked_id = $request->input('grade');
        $student = StudentProfile::find($student_id);

        $collection = collect($checked_id);

        $grade_9 = $collection->slice(0,1); //get 1
        $grade_10 = $collection->slice(1,1); //get 2
        $grade_11 = $collection->slice(2,1); //get 3
        

        $score_grade_9 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_9)->get();
        $score_grade_10 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_10)->get();
        $score_grade_11 = Score::where('student_profile_id', $student_id)->where('grade_id', $grade_11)->get();
    

        //Grade 9
            $credit_grade_9 = ($score_grade_9->sum('credit'))/2;
    
            $sum_pts_1_grade_9 = $score_grade_9->sum('pts_1');
    
            $sum_pts_2_grade_9 = $score_grade_9->sum('pts_2');

          

            //grade 10

            $credit_grade_10 = ($score_grade_10->sum('credit'))/2;
    
            $sum_pts_1_grade_10 = $score_grade_10->sum('pts_1');
    
            $sum_pts_2_grade_10 = $score_grade_10->sum('pts_2');

           

            


        // Grade 11
            $credit_grade_11 = ($score_grade_11->sum('credit'))/2;
    
            $sum_pts_1_grade_11 = $score_grade_11->sum('pts_1');
    
            $sum_pts_2_grade_11 = $score_grade_11->sum('pts_2');

          
        if(
            $credit_grade_9 > 0 
            && $credit_grade_10 > 0
            && $credit_grade_11 > 0
            
            && $sum_pts_1_grade_9 > 0
            && $sum_pts_2_grade_9 > 0
            && $sum_pts_1_grade_10 > 0
            && $sum_pts_2_grade_10 > 0
            && $sum_pts_1_grade_11 > 0
            && $sum_pts_2_grade_11 > 0
            

        ){

                // Calulate CGPA
           
                // Calulate CGPA
           
        $CGPA = (
                    $sum_pts_1_grade_9/$credit_grade_9 +
                    $sum_pts_2_grade_9/$credit_grade_9 +
                    $sum_pts_1_grade_10/$credit_grade_10 +
                    $sum_pts_2_grade_10/$credit_grade_10 +
                    $sum_pts_1_grade_11/$credit_grade_11 +
                    $sum_pts_2_grade_11/$credit_grade_11 
                    
                )/6;

           
        //total all credit for student
        $total_credit = $credit_grade_9*2 + $credit_grade_10*2 + $credit_grade_11*2;

           
        
        }else{
            
            $CGPA = "0.00";
            $total_credit = "0.00";

        }

        

            

    return view('admin.student.print.cgpa.cgpa_911_transcript')->with([
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


    //CGPA grade 10 to 11
    public function transcript1011(Request $request, $student_id){

        $checked_id = $request->input('grade');
        $student = StudentProfile::find($student_id);

        $collection = collect($checked_id);

        
        $grade_10 = $collection->slice(1,1); //get 2
        $grade_11 = $collection->slice(2,1); //get 3
        

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
            


    return view('admin.student.print.cgpa.cgpa_1011_transcript')->with([
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

    public function transcript1112( Request $request, $student_id){

    $checked_id = $request->input('grade');
    $student = StudentProfile::find($student_id);

    $collection = collect($checked_id);

    
    $grade_11 = $collection->slice(2,1); //get 3
    $grade_12 = $collection->slice(3,1); //get 4

    
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
           

        
    return view('admin.student.print.cgpa.cgpa_1112_transcript')->with([
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

    public function transcript1012( Request $request, $student_id){

    $checked_id = $request->input('grade');
    $student = StudentProfile::find($student_id);

    $collection = collect($checked_id);

    
    $grade_10 = $collection->slice(1,1); //get 2
    $grade_11 = $collection->slice(2,1); //get 3
    $grade_12 = $collection->slice(3,1); //get 4

    
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
           

            

        


            

    return view('admin.student.print.cgpa.cgpa_1012_transcript')->with([
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
        













}
