<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('login', function () {
    return view('login');
});
Route::post('/login','AuthController@login');

Route::group(['prefix'=>'admin', 'middleware' => ['before'=>'auth','after'=>'role:admin']], function () {
	// Route::get('/admin_home',function(){return view('admin.admin_home');});
	Route::get('/admin_home','AdminController@getEmployees');

	Route::get('/sendDocuments','AdminController@opensendDocument');
	Route::get('/sendNotifications','AdminController@opensendNotifications');
	Route::get('/contact_info',function(){return view('admin.contact_info');});
	Route::get('/documentsList','AdminController@DocumentsList');
	Route::get('/viewDocument/{doc_id}','AdminController@viewDocument');
	//Emplyee
	// Route::get('/getAllEmployees','AdminController@getEmployees');
	Route::post('/addEmployee','AdminController@addEmployee');
	Route::post('/updateEmployee','AdminController@updateEmployee');
	Route::post('/sendDocument','AdminController@sendDocument');
	Route::post('/sendNotification','AdminController@sendNotification');


});

Route::group(['prefix'=>'employee', 'middleware' => ['before'=>'auth','after'=>'role:employee']], function () {
	Route::get('/employee_home','EmployeeController@getDocuments');
	Route::get('/document/{doc_id}','EmployeeController@viewDocument');
	Route::get('/notifications','EmployeeController@allNotifications');
	Route::get('/signedDocuments','EmployeeController@signedDocuments');

	Route::post('/saveSignature','EmployeeController@saveSignature');
	// Route::get('/allEmployees','EmployeeController@allEmployees');
});