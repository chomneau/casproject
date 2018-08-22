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


class AbsentController extends Controller
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

        $this->absent = Absent::all();
        View::share('absent', $this->absent);
        
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

// student absent record
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
    ])->get();

    //return $highSchoolAbsent;
    
    return view('admin.Absent.absent_record.absent_highschool_index')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'hightSchoolAbsent'=> $highSchoolAbsent
        ]);
}

//insert absent value to database
public function storeHighSchoolAbsent(Request $request, $grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);

    $highSchoolAbsent = new AbsentRecord();
    //absent type is the id of absent table
    $highSchoolAbsent->absent_id = $request->absent_id;
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
    ])->get();

    return view('admin.Absent.absent_record.absent_highschool_edit')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'hightSchoolAbsent'=> $highSchoolAbsent,
        'absentRecord'=>$absentRecord
        ]);
}

//update absent value to database
public function updateHighSchoolAbsent(Request $request, $grade_id, $student_id, $absentRecord_id){
    $student = StudentProfile::find($student_id);
    $grade = Grade::find($grade_id);

    $highSchoolAbsent = AbsentRecord::find($absentRecord_id);
    //absent type is the id of absent table
    $highSchoolAbsent->absent_id = $request->absent_id;
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
    ])->get();

    //return $highSchoolAbsent;
    
    return view('admin.Absent.absent_record.absent_secondary_index')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'secondaryAbsent'=> $secondaryAbsent
        ]);

}


//insert absent value to secondary student SecondaryAbsent
public function storeSecondaryAbsent(Request $request, $grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = SecondaryLevel::find($grade_id);

    $secondaryAbsent = new SecondaryAbsent();
    //absent type is the id of absent table
    $secondaryAbsent->absent_id = $request->absent_id;
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
    ])->get();

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

    $secondaryAbsent = SecondaryAbsent::find($absentRecord_id);
    //absent type is the id of absent table
    $secondaryAbsent->absent_id = $request->absent_id;
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
    ])->get();

    //return $highSchoolAbsent;
    
    return view('admin.Absent.absent_record.absent_prek_index')->with([
        'grade_id'=>$grade ,
        'students'=> $student, 
        'prekAbsent'=> $prekAbsent
        ]);


}



//insert absent value to k and Pre-k student SecondaryAbsent
public function storePrekAbsent(Request $request, $grade_id, $student_id){
    $student = StudentProfile::find($student_id);
    $grade = KLevel::find($grade_id);

    $prekAbsent = new PrekAbsent();
    //absent type is the id of absent table
    $prekAbsent->absent_id = $request->absent_id;
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
    ])->get();

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

    $prekAbsent = PrekAbsent::find($prekAbsent_id);
    //absent type is the id of absent table
    $prekAbsent->absent_id = $request->absent_id;
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
