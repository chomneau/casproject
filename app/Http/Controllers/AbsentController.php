<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absent;
use Session;
use App\StudentProfile;
use App\AbsentRecord;

class AbsentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        
    }
}
