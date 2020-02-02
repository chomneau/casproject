<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Midterm extends Model
{
    

    public function calling($id)
    {
       
        $student = StudentProfile::find($id);
        $grade = Grade::all();

        return view('admin.student.mid_term.midTerm_menu')
            ->with(['students' => $student, 'grade' => $grade]);

    }  
    
    
    //Yearly report for High School

    public function midtermHighSchoolPrintView(Request $request, $student_id)
    {

    $student = StudentProfile::find($student_id);

    $checked_id = $request->input('grade');

    //get all daypresent
    $selectedDaypresent = $request->daypresent;
    $dayPresents = DayPresent::all();

    //absent report 
    //Quarter_1

    //count tardy in quarter_1
    $nonCount_absent_Quarter_1 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_1')->where('absent_type', 'non-count')->count();
    $countTardy_Quarter_1 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_1')->where('absent_type', 'Tardy')->count();

    $highschool_quarter_1 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_1')->count();


    $absent_tardy_quarter_1 = 0;

    if($countTardy_Quarter_1 >= 3){
        $absent_tardy_quarter_1 = floor($countTardy_Quarter_1/3);
    }elseif($countTardy_Quarter_1<3){
        $absent_tardy_quarter_1;
    }

    $highschool_absent_quarter_1 = abs((($highschool_quarter_1-$countTardy_Quarter_1)+$absent_tardy_quarter_1)-$nonCount_absent_Quarter_1);



    $highschool_daypresent_quarter_1 = AbsentRecord::where('student_profile_id', $student_id)
    ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

    if($highschool_daypresent_quarter_1 == null){
        $total_daypresent_1 = 0;
    }else{
        $total_daypresent_1 = $highschool_daypresent_quarter_1->quarter_day_present;
    }
        
    //Quarter_2
    $nonCount_absent_Quarter_2 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_2')->where('absent_type', 'non-count')->count();

    $highschool_quarter_2 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_2')->count();

    //count tardy in quarter_2
    $countTardy_Quarter_2 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_2')->where('absent_type', 'Tardy')->count();

    $absent_tardy_Quarter_2 = 0;

    if($countTardy_Quarter_2 >= 3){
        $absent_tardy_Quarter_2 = floor($countTardy_Quarter_2/3);
    }elseif($countTardy_Quarter_2<3){
        $absent_tardy_Quarter_2;
    }
    $highschool_absent_quarter_2 = abs((($highschool_quarter_2-$countTardy_Quarter_2)+$absent_tardy_Quarter_2)-$nonCount_absent_Quarter_2);

    $highschool_daypresent_quarter_2 = AbsentRecord::where('student_profile_id', $student_id)
    ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

    if($highschool_daypresent_quarter_2 == null){
        $total_daypresent_2 = 0;
    }else{
        $total_daypresent_2 = $highschool_daypresent_quarter_2->quarter_day_present;
    }

    //Quarter_3
    $nonCount_absent_Quarter_3 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_3')->where('absent_type', 'non-count')->count();
    $highschool_quarter_3 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_3')->count();

    //count tardy in quarter_3
    $countTardy_Quarter_3 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_3')->where('absent_type', 'Tardy')->count();

    $absent_tardy_Quarter_3 = 0;

    if($countTardy_Quarter_3 >= 3){
        $absent_tardy_Quarter_3 = floor($countTardy_Quarter_3/3);
    }elseif($countTardy_Quarter_3<3){
        $absent_tardy_Quarter_3;
    }
    $highschool_absent_quarter_3 = abs((($highschool_quarter_3-$countTardy_Quarter_3)+$absent_tardy_Quarter_3)-$nonCount_absent_Quarter_3);


    $highschool_daypresent_quarter_3 = AbsentRecord::where('student_profile_id', $student_id)
    ->where([ ['grade_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

    if($highschool_daypresent_quarter_3 == null){
        $total_daypresent_3 = 0;
    }else{
        $total_daypresent_3 = $highschool_daypresent_quarter_3->quarter_day_present;
    }

    //Quarter_4
    //count absent_type non-count
    $nonCount_absent_Quarter_4 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_4')->where('absent_type', 'non-count')->count();
    //count all absent
    $highschool_quarter_4 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_4')->count();

    //count tardy in quarter_4
    $countTardy_Quarter_4 = AbsentRecord::where('student_profile_id', $student_id)->where('grade_id', $checked_id)
    ->where('quarter_name','Quarter_4')->where('absent_type', 'Tardy')->count();



    $absent_tardy_Quarter_4 = 0;

    if($countTardy_Quarter_4 >= 3){
        $absent_tardy_Quarter_4 = floor($countTardy_Quarter_4/3);
    }elseif($countTardy_Quarter_4<3){
        $absent_tardy_Quarter_4;
    }
    $highschool_absent_quarter_4 = abs((($highschool_quarter_4-$countTardy_Quarter_4)+$absent_tardy_Quarter_4)-$nonCount_absent_Quarter_4);

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


    $semester_1 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->orderBy('grade_id', 'ASC')->get();


    $sum_pts_1 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->sum('pts_1');

    $sum_pts_2 = Score::where('student_profile_id', $student_id)
        ->where([['grade_id', $checked_id]])->sum('pts_2');




    //  $date = Score::where('student_profile_id', $student_id)
    // ->where([ ['grade_id', $checked_id], ['semester', 2] ])->first();


    return view('admin.student.mid_term.midterm_highschool_printview')
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

            'absent_tardy_quarter_1'=>$absent_tardy_quarter_1,
            
            //selected daypresent
            'selectedDaypresent'=>$selectedDaypresent,
            'dayPresents'=>$dayPresents,
            

    ]);
    }
}
