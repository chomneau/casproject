<?php

namespace App\Http\Controllers;
use App\AbsentTeacher;
use Illuminate\Http\Request;
use Session;
use App\Admin;
use App\Teacher;
use App\GradeProfile;
use View;
class AbsentTeacherController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);
    }

    public function store(Request $request, $admin_id, $teacher_id)
    {
        $this->validate($request, [

            'absent_type' => 'required',
            'number_day' => 'required',
            'from' => 'required',
            'to' => 'required',
            'reason' => 'required',

        ]);
        $admin = Admin::find($admin_id);
        $teacher = Teacher::find($teacher_id);
        

      //  return $admin->id.'_'.$teacher->first_name;

      //  $teacher = Teacher::find($teacher_id);

        $absentTeacher = new AbsentTeacher;

        $absentTeacher->absent_type = $request->absent_type;
        $absentTeacher->number_day = $request->number_day;
        $absentTeacher->from = $request->from;
        $absentTeacher->to = $request->to;
        $absentTeacher->reason = $request->reason;
        $absentTeacher->teacher_id = $teacher->id;
        $absentTeacher->save();

        Session::flash('sucess', 'You have sucessful add new record');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AbsentTeacherController  $absentTeacherController
     * @return \Illuminate\Http\Response
     */
    public function show(AbsentTeacherController $absentTeacherController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbsentTeacherController  $absentTeacherController
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id, $admin_id, $teacher_id)
    {
        $admin = Admin::findOrFail($admin_id);
        $teacher = Teacher::find($teacher_id);
        $absentTeacher = AbsentTeacher::findOrFail($id);
        return view('admin.teacher.edit-teacher-absent')->with([
            'admin'         =>  $admin,
            'teacher'       =>  $teacher,
            'absentTeacher' =>  $absentTeacher
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AbsentTeacherController  $absentTeacherController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id, $admin_id, $teacher_id)
    {

        
        $admin = Admin::findOrFail($admin_id);
        $teacher = Teacher::find($teacher_id);

        $absentTeacher = AbsentTeacher::findOrFail($id);
    
        $absentTeacher->absent_type = $request->absenttype;
        $absentTeacher->number_day = $request->numberday;
        $absentTeacher->from = $request->from;
        $absentTeacher->to = $request->to;
        $absentTeacher->reason = $request->reason;
        $absentTeacher->save();

        //return $absentTeacher;
        Session::flash('success', 'You have updated record sucessfully');
        return redirect('admin/teacher/profile/'.$admin->id."/".$teacher->id);
       // return redirect()->route('admin.teacher.profile',['id'=>$admin->id, 'id'=>$teacher->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AbsentTeacherController  $absentTeacherController
     * @return \Illuminate\Http\Response
     */
    public function destroy($absent_id)
    {
        $absent = AbsentTeacher::find($absent_id);
        
        $absent->delete();
        Session::flash('success', 'Deleted successfully!');
        return redirect()->back();
    }
}
