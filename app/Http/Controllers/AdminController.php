<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Storage;
use App\User;
use App\Document;
use App\DocumentUser;
use App\Notification;
use App\NotificationUser;

class AdminController extends BaseController
{
	public function getEmployees(){
		$users=$this->getAllEmployees();
		return view('admin.admin_home',['users'=>$users]);
	}

    public function opensendDocument(){
        $users=$this->getAllEmployees();
        return view('admin.sendDocuments',['users'=>$users]);
    }

    public function opensendNotifications(){
        $users=$this->getAllEmployees();
        return view('admin.sendNotifications',['users'=>$users]);
    }
    public function documentsList(){
        $documents= $this->allDocumentsList();
        return view('admin.documentsList',['documents'=>$documents]);
    }
    public function viewDocument($doc_id){
        $document =Document::select('document_url')->where('id',$doc_id)->first();
        $users_signed=DocumentUser::where('is_signed',true)->get();
        return view('admin.view_document',['document_url'=>$document,'signed_users'=>$users_signed]);

    }

    public function addEmployee(Request $request){
    	$rules=[
    		'name' =>'required',
            'email' => 'required|email|unique:users',
            'role'=>'required|in:admin,employee',
            'password' => 'required'
        ];
        $messages=[
            'email.unique' => 'Email Id Already Exists',
        ];
        $validator=Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $messages = $validator->messages();
                return redirect()->back()->withErrors($messages);
        } else {
            DB::beginTransaction();

        	$user= new User;
        	$user->name=$request->input('name');
        	$user->email=$request->input('email');
        	$user->role=$request->input('role');
        	$user->password=bcrypt($request->input('password'));
        	if($user->save()){
                DB::commit();
        		return redirect('admin/admin_home');
        	}
        	else{
                DB::rollBack();
        		return redirect()->back()->withErrors('somthing went Wrong');
        	}
        }
    }

    public function updateEmployee(Request $request){
    	$rules=[
    		'id'=> 'required|exists:users'
        ];
        $messages=[
            'email.unique' => 'Email Id Already Exists',
        ];
        $validator=Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $messages = $validator->messages();
                return redirect()->back()->withErrors($messages);
        } else {
            DB::beginTransaction();

        	$user=User::find($request->input('id'));
        	$user->name=$request->input('name');
        	$user->status=$request->input('role')? 1 :0;
        	if($user->save()){
        		// if($user->status){
                DB::commit();
        			return redirect('admin/admin_home');
        		// }
        		// else{
        		// 	return 'status is changed to false';
        		// }
        	}
        	else{
                DB::rollback();
        		return redirect()->back()->withErrors('somthing went Wrong');
        	}
    	}
    }

    public function sendDocument(Request $request){
        $rules=[
            'document' => 'required',
            'employee_ids.*'=>'required|exists:users,id',
        ];
        $validator=Validator::make($request->all(), $rules,[]);
        if ($validator->fails()) {
            $messages = $validator->messages();
                return redirect()->back()->withErrors($messages);
            // return $messages;
        } else {
            DB::beginTransaction();
            $employee_ids=$request->input('employee_ids');
            // return $employee_ids;
             if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filePath = Storage::disk('local')->put('company_documents', $file);
                $document= new Document;
                $document->document_url=$filePath;
                $document->document_name=$file->getClientOriginalName();
                $document->type=$file->extension();
                $document->admin_id=Auth::user()->id;
                if($document->save())
                {
                    // return $employee_ids;
                    foreach ($employee_ids as $employee_id) {
                        $documentusers=new DocumentUser;
                        $documentusers->document_id=$document->id;
                        $documentusers->user_id=$employee_id;
                        if($documentusers->save()){
                        }
                        else{
                            DB::rollback();
                            return "something went wrong1";
                        }
                    }
                    DB::commit();
                    return redirect('admin/admin_home');
                }
                else{
                    DB::rollback();
                    return "something went wrong2";
                }
            }
            else{
                DB::rollback();
                return "something went wrong3";
            }   
        }
    }



    public function sendNotification(Request $request){
        $rules=[
            'message' => 'required',
            'employee_ids.*'=>'required|exists:users,id',
        ];
        $validator=Validator::make($request->all(), $rules,[]);
        if ($validator->fails()) {
            $messages = $validator->messages();
                return redirect()->back()->withErrors($messages);
        } else {
            DB::beginTransaction();
            $message=$request->input('message');
            $employee_ids=$request->input('employee_ids');
            $notification =new Notification;
            $notification->message=$message;
            $notification->admin_id=Auth::user()->id;
            if($notification->save()){
                foreach ($employee_ids as $employee_id) {
                    $notificationusers=new NotificationUser;
                    $notificationusers->notification_id=$notification->id;
                    $notificationusers->user_id=$employee_id;
                    if($notificationusers->save()){
                    }
                    else{
                        DB::rollback();
                        return "something went wrong1";
                    }
                }
                DB::commit();
                return redirect('admin/admin_home');
            }
            else{
                    DB::rollback();
                    return "something went wrong1";
                }
        }
    }
}
