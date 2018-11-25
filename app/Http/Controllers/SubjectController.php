<?php

namespace App\Http\Controllers;

use App\KLevel;
use App\KSubject;
use App\PrimarySubject;
use App\SecondaryLevel;
use App\Subject;
use Illuminate\Http\Request;
use Session;
use View;
use App\Grade;

class SubjectController extends Controller
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
        


    }


    public function index()
    {
        $subject = Subject::orderBy('grade_id', 'ASC')->get();
        return view('admin.subject.index')->with('subject', $subject);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject_code' => 'required',
            'credit' => 'required',
            'grade_id' => 'required',

        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->credit = $request->credit;
        $subject->grade_id = $request->grade_id;

        $subject->save();

        Session::flash('success', 'You successfully added new subject!');
        return redirect()->back();
    }
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.edit_subject')
            ->with('subject', $subject);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject_code' => 'required',
            'credit' => 'required',
            'grade_id' => 'required',
        ]);
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->credit = $request->credit;
        $subject->grade_id = $request->grade_id;
        $subject->save();
        Session::flash('success', 'You successfully updated a subject!');
        return redirect('admin/subject');
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        Session::flash('success', 'You successfully Deleted a Subject!');
        return redirect()->back();
    }



    //setting Subject for K and Pre-k ===================================================
    public function showPrek()
    {
        $subject = KSubject::orderBy('id', 'ASC')->get();
        return view('admin.subject.pre_k_subject.index')->with('subject', $subject);
    }

    public function storePrek(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject_code' => 'required',
            'grade_id' => 'required',

        ]);

        $subject = new KSubject();
        $subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->grade_id = $request->grade_id;

        $subject->save();

        Session::flash('success', 'You successfully added new subject!');
        return redirect()->back();
    }
    public function editPrek($id)
    {
        $subject = KSubject::find($id);
        return view('admin.subject.pre_k_subject.edit_k_subject')
            ->with('subject', $subject);
    }

    public function updatePrek(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject_code' => 'required',
            'grade_id' => 'required',
        ]);
        $subject = KSubject::find($id);
        $subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->grade_id = $request->grade_id;
        $subject->save();
        Session::flash('success', 'You successfully updated a subject!');
        return redirect('admin/subject/prek');
    }

    public function destroyPrek($id)
    {
        $subject = KSubject::find($id);
        $subject->delete();
        Session::flash('success', 'You successfully Deleted a Subject!');
        return redirect()->back();
    }

    //setting Subject for Primary and Secondary ===================================================
    public function showPrimary()
    {
        $subject = PrimarySubject::orderBy('grade_id', 'ASC')->get();
        return view('admin.subject.primary_subject.index')->with('subject', $subject);
    }

    public function storePrimary(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject_code' => 'required',
            'grade_id' => 'required',

        ]);

        $subject = new PrimarySubject();
        $subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->grade_id = $request->grade_id;

        $subject->save();

        Session::flash('success', 'You successfully added new subject!');
        return redirect()->back();
    }
    public function editPrimary($id)
    {
        $subject = PrimarySubject::find($id);
        return view('admin.subject.primary_subject.edit_primary_subject')
            ->with('subject', $subject);
    }

    public function updatePrimary(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject_code' => 'required',
            'grade_id' => 'required',
        ]);
        $subject = PrimarySubject::find($id);
        $subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->grade_id = $request->grade_id;
        $subject->save();
        Session::flash('success', 'You successfully updated a subject!');
        return redirect('admin/subject/primary');
    }

    public function destroyPrimary($id)
    {
        $subject = PrimarySubject::find($id);
        $subject->delete();
        Session::flash('success', 'You successfully Deleted a Subject!');
        return redirect()->back();
    }


}
