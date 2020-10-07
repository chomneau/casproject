<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentProfile;
use Picqer;

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
}
