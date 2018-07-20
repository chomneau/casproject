<?php

namespace App\Http\Controllers;

use App\Uploadcv;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;

class UploadCvController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //uploads CV
    public function uploadCv(){
       $user_id = auth()->user()->id;
       $user = User::find($user_id);
       return view('user.cv.upload-cv')->with(['uploadCv'=>$user->uploadcv]);
    }


    public function uploadCvFunction(Request $request){
        $this->validate($request, [
            'upload' => 'required'
            //'upload' => 'required|mimes:pdf,doc,docx|size:5000'
        ]);
        $uploadCV = new Uploadcv;
        if($request->hasFile('upload'))
        {
            $upload = $request->upload;
            $upload_new_name = date('gi')."_".$upload->getClientOriginalName();
          //  $fileSize = File::size($upload);
            $upload->move('uploads/cv', $upload_new_name);
            $uploadCV->name = $upload_new_name;
           // $uploadCV->fileSize = $fileSize;
            $uploadCV->user_id = Auth::user()->id;
            $uploadCV->save();
            Session::flash('success', 'You have upload your file successfully!');
        }else{
            Session::flash('success', 'You can not upload this file');
        }

        return redirect()->back();
    }


    //delete uploaded user's cv
    public function destroy($id){
        $upload = Uploadcv::find($id);
        $upload->delete();
        Session::flash('success', 'You have deleted your file');
        return redirect()->back();

    }

}
