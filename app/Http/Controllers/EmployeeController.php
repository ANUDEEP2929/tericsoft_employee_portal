<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Storage;
use File;
use App\User;
use App\Document;
use App\DocumentUser;
use App\Notification;
use App\NotificationUser;

class EmployeeController extends BaseController
{
   	public function getDocuments(){
   		$documents[]=DocumentUser::where('user_id',Auth::user()->id)->get()->pluck('document_id');
   		$document=Document::whereIn('id',$documents[0])->OrderBy('created_at','DESC')->get();
   		return view("employee.employee_home",['documents'=>$document]);
   	}
   	public function viewDocument($doc_id){
        $document =Document::select('document_url','id')->where('id',$doc_id)->first();
        $documentuser =DocumentUser::where('user_id',Auth::user()->id)->where('document_id',$doc_id)->first();
	        if(Storage::exists($documentuser->sign_img)){
	        	$imgurl=Storage::get($documentuser->sign_img);
        		return view('employee.document',['document'=>$document,'documentuser'=>$documentuser,'imgurl'=>$imgurl]);
	        }
	        else{
        		return view('employee.document',['document'=>$document,'documentuser'=>$documentuser,'imgurl'=>'']);
	        }
    }
    public function allNotifications(){
    	$notifications[]=NotificationUser::where('user_id',Auth::user()->id)->get()->pluck('id');
   		$notification=Notification::whereIn('id',$notifications[0])->OrderBy('id','DESC')->get();
        return view('employee.allnotifications',['notifications'=>$notification]);
    }



    public function saveSignature(Request $request){
		$rules=[
            'doc_id' => 'required|exists:documents,id',
            'is_accept'=>'required',
            'imgurl'=>'required',
        ];
        $validator=Validator::make($request->all(), $rules,[]);
        if ($validator->fails()) {
            $messages = $validator->messages();
                return redirect()->back()->withErrors($messages);
            // return $messages;
        } else {
            DB::beginTransaction();
            // return $request->input('doc_id');
            $id=$request->input('doc_id');
            $is_accepted=$request->input('is_accept');
            $imgurl=$request->input('imgurl');

           $doc_user = DocumentUser::where('user_id',Auth::user()->id)->where('document_id',$id)->first();
           $filename= 'U'.Auth::user()->id.'D'.$id;
           $file_path= 'public/users_signature/'.$filename.'.txt';
           Storage::put($file_path,$imgurl);
           $doc_user->is_accepted=1;
           $doc_user->accepted_on='9/08/2018';
           $doc_user->is_signed=1;
           $doc_user->signed_on='9/08/2018';
           $doc_user->sign_img=$file_path;
           if($doc_user->save())
           {
           		DB::commit();
           		Storage::put('public/users_signature/'.$filename.'.txt',$imgurl);           		// return 'success';
           	 	return redirect()->back();
           }
           else{
           		DB::rollback();
           		return "something went wrong";
           		// return redirect()->back()->withErrors('somthing went wrong');
           }

        }
    }
}
