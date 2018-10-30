<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\DocumentUser;
use App\Notification;
use App\NotificationUser;

class BaseController extends Controller
{
    public function getAllEmployees(){
		$users=User::where('role','employee')->get();
		return $users;
	}

	 public function allDocumentsList(){
        $documents= Document::all();
        return $documents;
    }
}
