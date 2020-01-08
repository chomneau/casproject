<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecondaryAbsent;
use Session;
use View;
use App\SecondaryLevel;
use App\StudentProfile;
use App\GradeProfile;
use Illuminate\Support\Facades\Input;
use App\DayPresent;
use App\KLevel;
use App\PrekAbsent;
use App\Grade;
use App\AbsentRecord;

class InsertController extends Controller
{
    public function __construct()
    {
        $this->secondaryGrade = SecondaryLevel::orderBy('name', 'asc')->get();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->prekGrade = kLevel::orderBy('name', 'asc')->get();
        View::share('prekGrade', $this->prekGrade);

        $this->Grade = Grade::all();
        View::share('Grade', $this->Grade);
    }

    public function insertForm()
    {
        $gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        $student = StudentProfile::where('grade_profile_id', 18)->get();
        // return $student;
        return view('insert_data')->with(['students'=> $student, 'gradeProfiles'=>$gradeProfile]);
    }

    public function insertAllForm(Request $request)
    {
        $student = StudentProfile::where('grade_profile_id', $request->student_id)->get();
        $grade_id = Grade::find($request->grade_id);

        // return $student;

        return view('insert_all')->with(['students'=>$student, 'grade_id' =>$grade_id]);
    }

    public function insertAll(Request $request, $grade_id)
    {
        $grade = Grade::find($grade_id);
        $input = Input::all();
        foreach ($input['student_id'] as $index=>$value){

            $day_present = DayPresent::all();
            $absent = new AbsentRecord();
            $absent->student_profile_id = $value;
            $absent->grade_id = $grade->id;
            $absent->quarter_name = $day_present[0]->quarter_name;
            $absent->reason = "non-count-daypresent";
            $absent->quarter_day_present = $day_present[0]->quarter_day_present;
            $absent->absent_type = "non-count";
            $absent->absent_date = date("Y-m-d");
            $absent->save();

            $absent = new AbsentRecord();
            $absent->student_profile_id = $value;
            $absent->grade_id = $grade->id;
            $absent->quarter_name = $day_present[1]->quarter_name;
            $absent->reason = "non-count-daypresent";
            $absent->quarter_day_present = $day_present[1]->quarter_day_present;
            $absent->absent_type = "non-count";
            $absent->absent_date = date("Y-m-d");
            $absent->save();

            $absent = new AbsentRecord();
            $absent->student_profile_id = $value;
            $absent->grade_id = $grade->id;
            $absent->quarter_name = $day_present[2]->quarter_name;
            $absent->reason = "non-count-daypresent";
            $absent->quarter_day_present = $day_present[2]->quarter_day_present;
            $absent->absent_type = "non-count";
            $absent->absent_date = date("Y-m-d");
            $absent->save();

            $absent = new AbsentRecord();
            $absent->student_profile_id = $value;
            $absent->grade_id = $grade->id;
            $absent->quarter_name = $day_present[3]->quarter_name;
            $absent->reason = "non-count-daypresent";
            $absent->quarter_day_present = $day_present[3]->quarter_day_present;
            $absent->absent_type = "non-count";
            $absent->absent_date = date("Y-m-d");
            $absent->save();

    
        }
        Session::flash('success', 'Data is inserted!');
        return redirect('/insertForm');
    }

    public function insertData(Request $request)
    {
        $insert = new SecondaryAbsent();

        $insert->student_profile_id = $request->student_id;
        $insert->secondary_level_id = $request->grade_id;
        $insert->reason = 'non-count-daypresent';
        $insert->quarter_name = "Quarter_1";
        $insert->quarter_day_present = '41';
        $insert->absent_type = 'non-count';
        $insert->absent_date = '2019-11-01';
        $insert->save();

        $insert = new SecondaryAbsent();
        $insert->student_profile_id = $request->student_id;
        $insert->secondary_level_id = $request->grade_id;
        $insert->reason = 'non-count-daypresent';
        $insert->quarter_name = "Quarter_2";
        $insert->quarter_day_present = '51';
        $insert->absent_type = 'non-count';
        $insert->absent_date = '2019-11-01';
        $insert->save();

        $insert = new SecondaryAbsent();
        $insert->student_profile_id = $request->student_id;
        $insert->secondary_level_id = $request->grade_id;
        $insert->reason = 'non-count-daypresent';
        $insert->quarter_name = "Quarter_3";
        $insert->quarter_day_present = '45';
        $insert->absent_type = 'non-count';
        $insert->absent_date = '2019-11-01';
        $insert->save();

        $insert = new SecondaryAbsent();
        $insert->student_profile_id = $request->student_id;
        $insert->secondary_level_id = $request->grade_id;
        $insert->reason = 'non-count-daypresent';
        $insert->quarter_name = "Quarter_4";
        $insert->quarter_day_present = '46';
        $insert->absent_type = 'non-count';
        $insert->absent_date = '2019-11-01';
        $insert->save();

        Session::flash('success', 'Data is inserted!');

        return redirect()->back();
        
    }
}
