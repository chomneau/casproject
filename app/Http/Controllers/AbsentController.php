<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absent;
use Session;
use App\StudentProfile;
use App\AbsentRecord;
use App\Grade;
use App\KLevel;
use App\SecondaryLevel;
use App\Subject;
use View;
use Carbon;
use App\SecondaryAbsent;
use App\PrekAbsent;
use App\DayPresent;


class AbsentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->grade = Grade::all();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::all();
        View::share('kgrade', $this->kgrade);

        $this->secondaryGrade = SecondaryLevel::orderBy('name', 'asc')->get();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->subject = Subject::all();
        View::share('subject', $this->subject);

        $this->absent = Absent::all();
        View::share('absent', $this->absent);

        $this->daypresent = DayPresent::all();
        View::share('daypresent', $this->daypresent);
        
    }
    public function show(){
        $absent = Absent::all();
        return view ('admin.Absent.absentSetting.index')->with('absent', $absent);
    }

    public function store(Request $request){
        $this->validate($request, [
            'absentType'=>'required'
        ]);
       
        $absent = new Absent;
        $absent->absent_type = $request->absentType;
        $absent->save();

        Session::flash('success', 'You successfully added new absent type!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $absent = Absent::find($id);
        return view('admin.Absent.absentSetting.edit_absent')
            ->with('absent', $absent);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'absentType' => 'required',
        ]);
        $absent = Absent::find($id);
        $absent->absent_type = $request->absentType;
        $absent->save();
        Session::flash('success', 'You successfully updated a absent!');
        return redirect('admin/absent');
    }

    public function destroy($id)
    {
        $absent = Absent::find($id);
        $absent->delete();
        Session::flash('success', 'You successfully Deleted a absent$absent!');
        return redirect()->back();
    }

// show student absent record
    public function showAbsent($student_id){
        $student = StudentProfile::find($student_id);
        return view('admin.Absent.absent_record.index_absent')->with('students', $student);
    }

// highschool absent record
public function highSchoolAbsent($grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);
    
    $highSchoolAbsent = AbsentRecord::where([
        ['grade_id', $grade_id], 
        ['student_profile_id', $student_id],
        
    ])
    ->whereNotIn('absent_type', ['non-count'])
    
    ->orderBy('created_at', 'Desc')->get();
//first
    $quarter_1_unexcused = AbsentRecord::where([
        ['grade_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Unexcused'],
        ['quarter_name', 'quarter_1'],

       ])->count();

    $quarter_1_excused = AbsentRecord::where([
        ['grade_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Excused'],
        ['quarter_name', 'quarter_1'],

       ])->count(); 
       
    $quarter_1_tardy = AbsentRecord::where([
        ['grade_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Tardy'],
        ['quarter_name', 'quarter_1'],

       ])->count();  
       
    // $totalExcuse;
    $quarter_1_tardy_absent = 0;

    if($quarter_1_tardy >= 3){
        $quarter_1_tardy_absent = $quarter_1_tardy/3;
    }elseif($quarter_1_tardy<3){
        $quarter_1_tardy_absent;
    }


    $quarter_1_total_All_Absent = $quarter_1_tardy_absent+$quarter_1_excused+$quarter_1_unexcused; 
    
 //second
 $quarter_2_unexcused = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_2'],

   ])->count();

$quarter_2_excused = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_2'],

   ])->count(); 
   
$quarter_2_tardy = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_2'],

   ])->count();  
   
// $totalExcuse;
$quarter_2_tardy_absent = 0;

if($quarter_2_tardy >= 3){
    $quarter_2_tardy_absent = $quarter_2_tardy/3;
}elseif($quarter_2_tardy<3){
    $quarter_2_tardy_absent;
}


$quarter_2_total_All_Absent = $quarter_2_tardy_absent+$quarter_2_excused+$quarter_2_unexcused; 

//third
$quarter_3_unexcused = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_3'],

   ])->count();

$quarter_3_excused = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_3'],

   ])->count(); 
   
$quarter_3_tardy = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_3'],

   ])->count();  
   
// $totalExcuse;
$quarter_3_tardy_absent = 0;

if($quarter_3_tardy >= 3){
    $quarter_3_tardy_absent = $quarter_3_tardy/3;
}elseif($quarter_3_tardy<3){
    $quarter_3_tardy_absent;
}


$quarter_3_total_All_Absent = $quarter_3_tardy_absent+$quarter_3_excused+$quarter_3_unexcused; 

//fourth
$quarter_4_unexcused = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_4'],

   ])->count();

$quarter_4_excused = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_4'],

   ])->count(); 
   
$quarter_4_tardy = AbsentRecord::where([
    ['grade_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_4'],

   ])->count();  
   
// $totalExcuse;
$quarter_4_tardy_absent = 0;

if($quarter_4_tardy >= 3){
    $quarter_4_tardy_absent = $quarter_4_tardy/3;
}elseif($quarter_4_tardy<3){
    $quarter_4_tardy_absent;
}


$quarter_4_total_All_Absent = $quarter_4_tardy_absent+$quarter_4_excused+$quarter_4_unexcused;   



 $unexcused = AbsentRecord::where([
     ['grade_id', $grade_id],
     ['student_profile_id', $student_id],
     ['absent_type', 'Unexcused']
    ])->count();
$excused = AbsentRecord::where([
     ['grade_id', $grade_id],
     ['student_profile_id', $student_id],
     ['absent_type', 'Excused']
    ])->count();
$tardy = AbsentRecord::where([
     ['grade_id', $grade_id],
     ['student_profile_id', $student_id],
     ['absent_type', 'Tardy']
    ])->count();



    // $totalExcuse;
     $absent_tardy = 0;

     if($tardy >= 3){
         $absent_tardy = $tardy/3;
     }elseif($tardy<3){
         $absent_tardy;
     }


     $total_All_Absent = $quarter_1_total_All_Absent+$quarter_2_total_All_Absent
     +$quarter_3_total_All_Absent+$quarter_4_total_All_Absent;
    


    
    return view('admin.Absent.absent_record.absent_highschool_index')->with([
        'grade_id'=>$grade ,
        'students'=> $student,
        'hightSchoolAbsent'=> $highSchoolAbsent,

        'unexcused'=>$unexcused,
        'totalAbsent'=>$total_All_Absent,
        'excused'=>$excused,
        'tardy'=>$tardy,
        //first
        'quarter_1_total_All_Absent' => $quarter_1_total_All_Absent,
        'quarter_1_excused'=>$quarter_1_excused,
        'quarter_1_unexcused'=>$quarter_1_unexcused,
        'quarter_1_tardy'=>$quarter_1_tardy,

        //second
        'quarter_2_total_All_Absent' => $quarter_2_total_All_Absent,
        'quarter_2_excused'=>$quarter_2_excused,
        'quarter_2_unexcused'=>$quarter_2_unexcused,
        'quarter_2_tardy'=>$quarter_2_tardy,
        
        //Third
        'quarter_3_total_All_Absent' => $quarter_3_total_All_Absent,
        'quarter_3_excused'=>$quarter_3_excused,
        'quarter_3_unexcused'=>$quarter_3_unexcused,
        'quarter_3_tardy'=>$quarter_3_tardy,

        //Fourth
        'quarter_4_total_All_Absent' => $quarter_4_total_All_Absent,
        'quarter_4_excused'=>$quarter_4_excused,
        'quarter_4_unexcused'=>$quarter_4_unexcused,
        'quarter_4_tardy'=>$quarter_4_tardy,


        ]);
}

//insert absent value to database
public function storeHighSchoolAbsent(Request $request, $grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);

    $daypresent_id = $request->quarter_id;
    $daypresent = DayPresent::find($daypresent_id);

   

    $highSchoolAbsent = new AbsentRecord();
    //absent type is the id of absent table
    $highSchoolAbsent->absent_type = $request->absent_type;
    $highSchoolAbsent->quarter_name = $daypresent->quarter_name;
    $highSchoolAbsent->quarter_day_present = $daypresent->quarter_day_present;

    $highSchoolAbsent->student_profile_id = $student->id;
    $highSchoolAbsent->grade_id = $grade->id;
    $highSchoolAbsent->reason = $request->reason;
    $highSchoolAbsent->absent_date = $request->absent_date;
    $highSchoolAbsent->save();


    Session::flash('success', 'You successfully add a new record');
    return redirect()->back();
}

public function editHighSchoolAbsent($grade_id, $student_id, $absentRecord_id){
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);
    
    $absentRecord = AbsentRecord::find($absentRecord_id);
    

    $highSchoolAbsent = AbsentRecord::where([
        ['grade_id', $grade_id], 
        ['student_profile_id', $student_id],
    ])
    ->whereNotIn('absent_type', ['non-count'])
    ->orderBy('created_at', 'Desc')->get();

    

    return view('admin.Absent.absent_record.absent_highschool_edit')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'hightSchoolAbsent'=> $highSchoolAbsent,
        'absentRecord'=>$absentRecord,
        
        ]);
}

//update absent value to database
public function updateHighSchoolAbsent(Request $request, $grade_id, $student_id, $absentRecord_id){
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);

    $daypresent_id = $request->quarter_id;
    $daypresent = DayPresent::find($daypresent_id);

    $highSchoolAbsent = AbsentRecord::findOrFail($absentRecord_id);
    //absent type is the id of absent table
    $highSchoolAbsent->absent_type = $request->absent_type;
    $highSchoolAbsent->quarter_name = $daypresent->quarter_name;
    $highSchoolAbsent->quarter_day_present = $daypresent->quarter_day_present;
    $highSchoolAbsent->student_profile_id = $student->id;
    $highSchoolAbsent->grade_id = $grade->id;
    $highSchoolAbsent->reason = $request->reason;
    $highSchoolAbsent->absent_date = $request->absent_date;
    $highSchoolAbsent->save();

    Session::flash('success', 'You successfully update the record');
    return redirect()->route('highSchool.absentRecord', ['grade_id'=>$grade->id, 'student_id'=>$student->id]);
}

//delete absent record

public function deleteHighSchoolAbsent($grade_id, $student_id, $absentRecord_id){
    
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);

    $delete = AbsentRecord::find($absentRecord_id);
    $delete->delete();

    Session::flash('success', 'You successfully deleted a record');
    return redirect()->route('highSchool.absentRecord', ['grade_id'=>$grade->id, 'student_id'=>$student->id]);


}

// ******* Secondary School Absent ******* //

public function secondarySchoolAbsent($grade_id, $student_id){


    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);
    $secondaryAbsent = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id], 
        ['student_profile_id', $student_id],
    ])
    ->whereNotIn('absent_type', ['non-count'])
    ->orderBy('created_at', 'Desc')->get();

//first
$quarter_1_unexcused = SecondaryAbsent::where([
    ['secondary_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_1'],

   ])->count();

$quarter_1_excused = SecondaryAbsent::where([
    ['secondary_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_1'],

   ])->count(); 
   
$quarter_1_tardy = SecondaryAbsent::where([
    ['secondary_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_1'],

   ])->count();  
   
// $totalExcuse;
$quarter_1_tardy_absent = 0;

if($quarter_1_tardy >= 3){
    $quarter_1_tardy_absent = $quarter_1_tardy/3;
}elseif($quarter_1_tardy<3){
    $quarter_1_tardy_absent;
}


$quarter_1_total_All_Absent = $quarter_1_tardy_absent+$quarter_1_excused+$quarter_1_unexcused; 

//second
$quarter_2_unexcused = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Unexcused'],
['quarter_name', 'quarter_2'],

])->count();

$quarter_2_excused = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Excused'],
['quarter_name', 'quarter_2'],

])->count(); 

$quarter_2_tardy = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Tardy'],
['quarter_name', 'quarter_2'],

])->count();  

// $totalExcuse;
$quarter_2_tardy_absent = 0;

if($quarter_2_tardy >= 3){
$quarter_2_tardy_absent = $quarter_2_tardy/3;
}elseif($quarter_2_tardy<3){
$quarter_2_tardy_absent;
}


$quarter_2_total_All_Absent = $quarter_2_tardy_absent+$quarter_2_excused+$quarter_2_unexcused; 

//third
$quarter_3_unexcused = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Unexcused'],
['quarter_name', 'quarter_3'],

])->count();

$quarter_3_excused = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Excused'],
['quarter_name', 'quarter_3'],

])->count(); 

$quarter_3_tardy = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Tardy'],
['quarter_name', 'quarter_3'],

])->count();  

// $totalExcuse;
$quarter_3_tardy_absent = 0;

if($quarter_3_tardy >= 3){
$quarter_3_tardy_absent = $quarter_3_tardy/3;
}elseif($quarter_3_tardy<3){
$quarter_3_tardy_absent;
}


$quarter_3_total_All_Absent = $quarter_3_tardy_absent+$quarter_3_excused+$quarter_3_unexcused; 

//fourth
$quarter_4_unexcused = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Unexcused'],
['quarter_name', 'quarter_4'],

])->count();

$quarter_4_excused = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Excused'],
['quarter_name', 'quarter_4'],

])->count(); 

$quarter_4_tardy = SecondaryAbsent::where([
['secondary_level_id', $grade_id],
['student_profile_id', $student_id],
['absent_type', 'Tardy'],
['quarter_name', 'quarter_4'],

])->count();  

// $totalExcuse;
$quarter_4_tardy_absent = 0;

if($quarter_4_tardy >= 3){
$quarter_4_tardy_absent = $quarter_4_tardy/3;
}elseif($quarter_4_tardy<3){
$quarter_4_tardy_absent;
}


$quarter_4_total_All_Absent = $quarter_4_tardy_absent+$quarter_4_excused+$quarter_4_unexcused;   



    $unexcused = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Unexcused']
    ])->count();
    $excused = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Excused']
    ])->count();
    $tardy = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Tardy']
    ])->count();


    $absent_tardy = 0;

    if($tardy >= 3){
        $absent_tardy = $tardy/3;
    }elseif($tardy<3){
        $absent_tardy;
    }


    $total_All_Absent = $quarter_1_total_All_Absent+$quarter_2_total_All_Absent
     +$quarter_3_total_All_Absent+$quarter_4_total_All_Absent;



    //return $highSchoolAbsent;
    
    return view('admin.Absent.absent_record.absent_secondary_index')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'secondaryAbsent'=> $secondaryAbsent,
        'unexcused'=>$unexcused,
        'totalAbsent'=>$total_All_Absent,
        'excused'=>$excused,
        'tardy'=>$tardy,


        //first
        'quarter_1_total_All_Absent' => $quarter_1_total_All_Absent,
        'quarter_1_excused'=>$quarter_1_excused,
        'quarter_1_unexcused'=>$quarter_1_unexcused,
        'quarter_1_tardy'=>$quarter_1_tardy,

        //second
        'quarter_2_total_All_Absent' => $quarter_2_total_All_Absent,
        'quarter_2_excused'=>$quarter_2_excused,
        'quarter_2_unexcused'=>$quarter_2_unexcused,
        'quarter_2_tardy'=>$quarter_2_tardy,
        
        //Third
        'quarter_3_total_All_Absent' => $quarter_3_total_All_Absent,
        'quarter_3_excused'=>$quarter_3_excused,
        'quarter_3_unexcused'=>$quarter_3_unexcused,
        'quarter_3_tardy'=>$quarter_3_tardy,

        //Fourth
        'quarter_4_total_All_Absent' => $quarter_4_total_All_Absent,
        'quarter_4_excused'=>$quarter_4_excused,
        'quarter_4_unexcused'=>$quarter_4_unexcused,
        'quarter_4_tardy'=>$quarter_4_tardy,

        ]);

}




//insert absent value to secondary student SecondaryAbsent
public function storeSecondaryAbsent(Request $request, $grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);

    $daypresent_id = $request->quarter_id;
    $daypresent = DayPresent::find($daypresent_id);

    $secondaryAbsent = new SecondaryAbsent();
    //absent type is the id of absent table
    $secondaryAbsent->absent_type = $request->absent_type;

    $secondaryAbsent->quarter_name = $daypresent->quarter_name;
    $secondaryAbsent->quarter_day_present = $daypresent->quarter_day_present;

    $secondaryAbsent->student_profile_id = $student->id;
    $secondaryAbsent->secondary_level_id = $grade->id;
    $secondaryAbsent->reason = $request->reason;
    $secondaryAbsent->absent_date = $request->absent_date;
    $secondaryAbsent->save();

    Session::flash('success', 'You successfully add a new record');
    return redirect()->back();
}

public function editSecondaryAbsent($grade_id, $student_id, $secondaryAbsent_id){
    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);
    //find the id of secondaryAbsent record
    $secondaryAbsent_edit = SecondaryAbsent::find($secondaryAbsent_id);

    $secondaryAbsent = SecondaryAbsent::where([
        ['secondary_level_id', $grade_id], 
        ['student_profile_id', $student_id],
    ])
    ->whereNotIn('absent_type', ['non-count'])
    ->orderBy('created_at', 'Desc')->get();

    return view('admin.Absent.absent_record.absent_secondary_edit')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'secondaryAbsent'=> $secondaryAbsent,
        'secondaryAbsent_edit'=>$secondaryAbsent_edit
        ]);
}

//update absent value to SecondaryAbsent
public function updateSecondaryAbsent(Request $request, $grade_id, $student_id, $absentRecord_id){
    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);

    $daypresent_id = $request->quarter_id;
    $daypresent = DayPresent::find($daypresent_id);

    
    $secondaryAbsent = SecondaryAbsent::find($absentRecord_id);
    //absent type is the id of absent table
    $secondaryAbsent->quarter_name = $daypresent->quarter_name;
    $secondaryAbsent->quarter_day_present = $daypresent->quarter_day_present;

    $secondaryAbsent->absent_type = $request->absent_type;
    $secondaryAbsent->student_profile_id = $student->id;
    $secondaryAbsent->secondary_level_id = $grade->id;
    $secondaryAbsent->reason = $request->reason;
    $secondaryAbsent->absent_date = $request->absent_date;
    $secondaryAbsent->save();


    Session::flash('success', 'You successfully update the record');
    return redirect()->route('secondarySchool.absentRecord', ['grade_id'=>$grade->id, 'student_id'=>$student->id]);
}

//delete absent record in SecondaryAbsent

public function deleteSecondaryAbsent($grade_id, $student_id, $absentRecord_id){
    
    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);

    $delete = SecondaryAbsent::find($absentRecord_id);
    $delete->delete();

    Session::flash('success', 'You successfully deleted a record');
    return redirect()->route('secondarySchool.absentRecord', ['grade_id'=>$grade->id, 'student_id'=>$student->id]);


}




// ******* K and Pre-k School Absent ******* //

public function prekSchoolAbsent($grade_id, $student_id){


    $student = StudentProfile::find($student_id);
    $grade = KLevel::find($grade_id);
    $prekAbsent = PrekAbsent::where([
        ['k_level_id', $grade_id], 
        ['student_profile_id', $student_id],

    ])
     ->whereNotIn('absent_type', ['non-count'])
    ->orderBy('created_at', 'Desc')->get();

   //first
    $quarter_1_unexcused = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Unexcused'],
        ['quarter_name', 'quarter_1'],

    ])->count();

    $quarter_1_excused = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Excused'],
        ['quarter_name', 'quarter_1'],

    ])->count(); 
    
    $quarter_1_tardy = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Tardy'],
        ['quarter_name', 'quarter_1'],

    ])->count();  
    
    // $totalExcuse;
    $quarter_1_tardy_absent = 0;

    if($quarter_1_tardy >= 3){
        $quarter_1_tardy_absent = $quarter_1_tardy/3;
    }elseif($quarter_1_tardy<3){
        $quarter_1_tardy_absent;
    }


    $quarter_1_total_All_Absent = $quarter_1_tardy_absent+$quarter_1_excused+$quarter_1_unexcused; 

    //second
    $quarter_2_unexcused = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_2'],

    ])->count();

    $quarter_2_excused = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_2'],

    ])->count(); 

    $quarter_2_tardy = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_2'],

    ])->count();  

    // $totalExcuse;
    $quarter_2_tardy_absent = 0;

    if($quarter_2_tardy >= 3){
    $quarter_2_tardy_absent = $quarter_2_tardy/3;
    }elseif($quarter_2_tardy<3){
    $quarter_2_tardy_absent;
    }


    $quarter_2_total_All_Absent = $quarter_2_tardy_absent+$quarter_2_excused+$quarter_2_unexcused; 

    //third
    $quarter_3_unexcused = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_3'],

    ])->count();

    $quarter_3_excused = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_3'],

    ])->count(); 

    $quarter_3_tardy = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_3'],

    ])->count();  

    // $totalExcuse;
    $quarter_3_tardy_absent = 0;

    if($quarter_3_tardy >= 3){
    $quarter_3_tardy_absent = $quarter_3_tardy/3;
    }elseif($quarter_3_tardy<3){
    $quarter_3_tardy_absent;
    }


    $quarter_3_total_All_Absent = $quarter_3_tardy_absent+$quarter_3_excused+$quarter_3_unexcused; 

    //fourth
    $quarter_4_unexcused = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Unexcused'],
    ['quarter_name', 'quarter_4'],

    ])->count();

    $quarter_4_excused = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Excused'],
    ['quarter_name', 'quarter_4'],

    ])->count(); 

    $quarter_4_tardy = PrekAbsent::where([
    ['k_level_id', $grade_id],
    ['student_profile_id', $student_id],
    ['absent_type', 'Tardy'],
    ['quarter_name', 'quarter_4'],

    ])->count();  

    // $totalExcuse;
    $quarter_4_tardy_absent = 0;

    if($quarter_4_tardy >= 3){
    $quarter_4_tardy_absent = $quarter_4_tardy/3;
    }elseif($quarter_4_tardy<3){
    $quarter_4_tardy_absent;
    }


    $quarter_4_total_All_Absent = $quarter_4_tardy_absent+$quarter_4_excused+$quarter_4_unexcused;   




    $unexcused = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Unexcused']
    ])->count();
    $excused = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Excused']
    ])->count();
    $tardy = PrekAbsent::where([
        ['k_level_id', $grade_id],
        ['student_profile_id', $student_id],
        ['absent_type', 'Tardy']
    ])->count();


    $absent_tardy = 0;

    if($tardy >= 3){
        $absent_tardy = $tardy/3;
    }elseif($tardy<3){
        $absent_tardy;
    }


    $total_All_Absent = $quarter_1_total_All_Absent+$quarter_2_total_All_Absent
     +$quarter_3_total_All_Absent+$quarter_4_total_All_Absent;



    return view('admin.Absent.absent_record.absent_prek_index')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'prekAbsent'=> $prekAbsent,
        'unexcused'=>$unexcused,
        'totalAbsent'=>$total_All_Absent,
        'excused'=>$excused,
        'tardy'=>$tardy,

         //first
         'quarter_1_total_All_Absent' => $quarter_1_total_All_Absent,
         'quarter_1_excused'=>$quarter_1_excused,
         'quarter_1_unexcused'=>$quarter_1_unexcused,
         'quarter_1_tardy'=>$quarter_1_tardy,
 
         //second
         'quarter_2_total_All_Absent' => $quarter_2_total_All_Absent,
         'quarter_2_excused'=>$quarter_2_excused,
         'quarter_2_unexcused'=>$quarter_2_unexcused,
         'quarter_2_tardy'=>$quarter_2_tardy,
         
         //Third
         'quarter_3_total_All_Absent' => $quarter_3_total_All_Absent,
         'quarter_3_excused'=>$quarter_3_excused,
         'quarter_3_unexcused'=>$quarter_3_unexcused,
         'quarter_3_tardy'=>$quarter_3_tardy,
 
         //Fourth
         'quarter_4_total_All_Absent' => $quarter_4_total_All_Absent,
         'quarter_4_excused'=>$quarter_4_excused,
         'quarter_4_unexcused'=>$quarter_4_unexcused,
         'quarter_4_tardy'=>$quarter_4_tardy,

        ]);


}



//insert absent value to k and Pre-k student SecondaryAbsent
public function storePrekAbsent(Request $request, $grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = KLevel::find($grade_id);

    $daypresent_id = $request->quarter_id;
    $daypresent = DayPresent::find($daypresent_id);

    $prekAbsent = new PrekAbsent();
    //absent type is the id of absent table
    $prekAbsent->absent_type = $request->absent_type;

    $prekAbsent->quarter_name = $daypresent->quarter_name;
    $prekAbsent->quarter_day_present = $daypresent->quarter_day_present;

    $prekAbsent->student_profile_id = $student->id;
    $prekAbsent->k_level_id = $grade->id;
    $prekAbsent->reason = $request->reason;
    $prekAbsent->absent_date = $request->absent_date;
    $prekAbsent->save();


    Session::flash('success', 'You successfully add a new record');
    return redirect()->back();
}

public function editPrekAbsent($grade_id, $student_id, $prekAbsent_id){
    $student = StudentProfile::find($student_id);
    $grade = KLevel::find($grade_id);
    //find the id of prekAbsent record
    $prekAbsent_edit = PrekAbsent::find($prekAbsent_id);

    $prekAbsent = PrekAbsent::where([
        ['k_level_id', $grade_id], 
        ['student_profile_id', $student_id],
    ])
    ->whereNotIn('absent_type', ['non-count'])
    ->orderBy('created_at', 'Desc')->get();

    return view('admin.Absent.absent_record.absent_prek_edit')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'prekAbsent'=> $prekAbsent,
        'prekAbsent_edit'=>$prekAbsent_edit
        ]);
}

//update absent value to prekAbsent
public function updatePrekAbsent(Request $request, $grade_id, $student_id, $prekAbsent_id){
    $student = StudentProfile::find($student_id);
    $grade = KLevel::find($grade_id);

    $daypresent_id = $request->quarter_id;
    $daypresent = DayPresent::find($daypresent_id);

    $prekAbsent = PrekAbsent::find($prekAbsent_id);
    //absent type is the id of absent table
    $prekAbsent->absent_type = $request->absent_type;

    $prekAbsent->quarter_name = $daypresent->quarter_name;
    $prekAbsent->quarter_day_present = $daypresent->quarter_day_present;

    $prekAbsent->student_profile_id = $student->id;
    $prekAbsent->k_level_id = $grade->id;
    $prekAbsent->reason = $request->reason;
    $prekAbsent->absent_date = $request->absent_date;
    $prekAbsent->save();


    Session::flash('success', 'You successfully update the record');
    return redirect()->route('prekSchool.absentRecord', ['grade_id'=>$grade->id, 'student_id'=>$student->id]);
}

//delete absent record in prekAbsent

public function deletePrekAbsent($grade_id, $student_id, $prekAbsent_id){
    
    $student = StudentProfile::find($student_id);
    $grade = KLevel::find($grade_id);

    $delete = PrekAbsent::find($prekAbsent_id);
    $delete->delete();

    Session::flash('success', 'You successfully deleted a record');
    return redirect()->route('prekSchool.absentRecord', ['grade_id'=>$grade->id, 'student_id'=>$student->id]);


}






}
