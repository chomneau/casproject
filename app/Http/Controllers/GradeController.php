<?php

namespace App\Http\Controllers;

use App\Grade;
use App\KLevel;
use App\PrimaryLevel;
use App\Score;
use App\SecondaryLevel;
use Illuminate\Http\Request;
use Session;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $grade = Grade::OrderBy('order', 'asc')->get();
        return view('admin.grade.highschool.index')->with('grades', $grade);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'grade'=>'required'
        ]);

        $grade = new Grade();
        $grade->grade_name = $request->grade;
        $grade->order = $request->order;
        $grade->save();

        Session::flash('success', 'You successfully added new Grade!');
        return redirect()->back();
    }
    public function edit($id)
    {

        $grade = Grade::find($id);
        return view('admin.grade.highschool.edit_grade')
            ->with('grade', $grade);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'grade' => 'required',
        ]);
        $grade = Grade::find($id);
        $grade->grade_name = $request->grade;
        $grade->order = $request->order;
        $grade->save();
        Session::flash('success', 'You successfully updated a Grade!');
        return redirect('admin/grade');
    }

    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        Session::flash('success', 'You successfully Deleted a Grade!');
        return redirect()->back();
    }


    //K and Pre-k


    public function showPrek()
    {
        $grade = KLevel::OrderBy('order', 'asc')->get();
        return view('admin.grade.prek.index')->with('grades', $grade);
    }

    public function storePrek(Request $request)
    {
        $this->validate($request, [
            'grade'=>'required'
        ]);

        $grade = new KLevel();
        $grade->name = $request->grade;
        $grade->order = $request->order;
        $grade->save();

        Session::flash('success', 'You successfully added new Grade!');
        return redirect()->back();
    }
    public function editPrek($id)
    {

        $grade = KLevel::find($id);
        return view('admin.grade.prek.edit_prek')
            ->with('grade', $grade);
    }

    public function updatePrek(Request $request, $id){
        $this->validate($request, [
            'grade' => 'required',
        ]);
        $grade = KLevel::find($id);
        $grade->name = $request->grade;
        $grade->order = $request->order;
        $grade->save();
        Session::flash('success', 'You successfully updated a Grade!');
        return redirect('admin/prek');
    }

    public function destroyPrek($id)
    {
        $grade = KLevel::find($id);
        $grade->delete();
        Session::flash('success', 'You successfully Deleted a Grade!');
        return redirect()->back();
    }

    //Setting Primary Grade


    public function showPrimary()
    {
        $grade = PrimaryLevel::OrderBy('order', 'asc')->get();
        return view('admin.grade.primary.index')->with('grades', $grade);
    }

    public function storePrimary(Request $request)
    {
        $this->validate($request, [
            'grade'=>'required'
        ]);

        $grade = new PrimaryLevel();
        $grade->name = $request->grade;
        $grade->order = $request->order;
        $grade->save();

        Session::flash('success', 'You successfully added new Grade!');
        return redirect()->back();
    }
    public function editPrimary($id)
    {

        $grade = PrimaryLevel::find($id);
        return view('admin.grade.primary.edit_primary')
            ->with('grade', $grade);
    }

    public function updatePrimary(Request $request, $id){
        $this->validate($request, [
            'grade' => 'required',
        ]);
        $grade = PrimaryLevel::find($id);
        $grade->name = $request->grade;
        $grade->order = $request->order;
        $grade->save();
        Session::flash('success', 'You successfully updated a Grade!');
        return redirect('admin/primary');
    }

    public function destroyPrimary($id)
    {
        $grade = PrimaryLevel::find($id);
        $grade->delete();
        Session::flash('success', 'You successfully Deleted a Grade!');
        return redirect()->back();
    }

//Setting Secondary Grade


    public function showSecondary()
    {
        $grade = SecondaryLevel::OrderBy('order', 'asc')->get();
        return view('admin.grade.secondary.index')->with('grades', $grade);
    }

    public function storeSecondary(Request $request)
    {
        $this->validate($request, [
            'grade'=>'required'
        ]);

        $grade = new SecondaryLevel();
        $grade->name = $request->grade;
        $grade->order = $request->order;
        $grade->save();

        Session::flash('success', 'You successfully added new Grade!');
        return redirect()->back();
    }
    public function editSecondary($id)
    {

        $grade = SecondaryLevel::find($id);
        return view('admin.grade.secondary.edit_secondary')
            ->with('grade', $grade);
    }

    public function updateSecondary(Request $request, $id){
        $this->validate($request, [
            'grade' => 'required',
        ]);
        $grade = SecondaryLevel::find($id);
        $grade->name = $request->grade;
        $grade->order = $request->order;
        $grade->save();
        Session::flash('success', 'You successfully updated a Grade!');
        return redirect('admin/secondary');
    }

    public function destroySecondary($id)
    {
        $grade = SecondaryLevel::find($id);
        $grade->delete();
        Session::flash('success', 'You successfully Deleted a Grade!');
        return redirect()->back();
    }



}
