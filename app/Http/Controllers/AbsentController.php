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

























}
