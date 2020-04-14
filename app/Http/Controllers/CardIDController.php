<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentProfile;

class CardIDController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showCardID($student_id)
    {
    	//return "Testing = ".$student_id;
    	$student = StudentProfile::find($student_id);

    	return view('admin.student.student_CardID.student_cardID_show')->with('student', $student);
    }
}
