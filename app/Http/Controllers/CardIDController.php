<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentProfile;
use Picqer;
use PDF;



class CardIDController extends Controller
{
    

	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showCardID(Request $request ,$student_id)
    {
    	//return "Testing = ".$student_id;
        $data['student'] = StudentProfile::find($student_id);
        $student_cardID = StudentProfile::find($student_id);
        $student_card = $student_cardID->card_id;
        //return $student_card;
        //generate barcode
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($student_card, $generator::TYPE_CODE_128_A);
        //return $barcode;  

        if($request->has('download')){
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            $barcode = $generator->getBarcode($student_card, $generator::TYPE_CODE_128_A);
            $pdf = PDF::loadView('admin.student.student_CardID.print_student_card', $data, compact('barcode')); 
            return $pdf->stream('student_CardID.pdf');
        }

    	return view('admin.student.student_CardID.student_cardID_show', $data, compact('barcode'));
    }

    public function previewStudentCardID(Request $request, $id)
    {
        $student = StudentProfile::find($id);
        $student_card = $student->card_id;
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($student_card, $generator::TYPE_CODE_128_A);
        
        
        return view('admin.student.student_CardID.print_student_card', $data ,compact('barcode'));

    }

    public function printStudentCardID(Request $request, $id)
    {
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($request->card_id, $generator::TYPE_CODE_128_A,1,20);
        $photo = StudentProfile::find($id)->photo;
        $data = [

            'last_name' => $request->last_name, 
            'first_name' =>$request->first_name, 
            'card_id' =>$request->card_id, 
            'grade' =>$request->grade, 
            'contact' =>$request->contact, 
            'expired_date' =>$request->expired_date,
            'barcode' =>$barcode,
            'photo' =>$photo,

        ];

        $first_name = StudentProfile::find($id)->first_name;
        $last_name = StudentProfile::find($id)->last_name;
             
        $pdf = PDF::loadView('admin.student.student_CardID.download_student_card', $data)
        ->setPaper([0, 0, 144, 252], 'landscape'); 

        return $pdf->stream($first_name.' '.$last_name.'.pdf');
        
    }

    
}
