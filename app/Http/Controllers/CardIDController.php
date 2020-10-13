<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentProfile;
use Picqer;
use PDF;
use Picqer\Barcode\BarcodeGeneratorHTML;

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
        $student_card = $student->card_id;
        //return $student_card;
        //generate barcode
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($student_card, $generator::TYPE_CODE_128_A);
        //return $barcode;  

    	return view('admin.student.student_CardID.student_cardID_show')->with(['student' => $student, 'barcode' => $barcode]);
    }

    public function previewStudentCardID($id)
    {
        $student = StudentProfile::find($id);
        $student_card = $student->card_id;
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($student_card, $generator::TYPE_CODE_128_A);
        return view('admin.student.student_CardID.print_student_card',compact('student', 'barcode'));
    }

    public function printStudentCardID($id)
    {
        $student = StudentProfile::find($id);
        
        $student_card = $student->card_id;
        $filename = $student->first_name;
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($student_card, $generator::TYPE_CODE_128_A);
        $pdf = PDF::loadView('admin.student.student_CardID.print_student_card', compact('student', 'barcode')); 
        return $pdf->download('dum.pdf');
        // return view('admin.student.student_CardID.print_student_card')->with(['student' => $student, 'barcode' => $barcode]);
    }
}
