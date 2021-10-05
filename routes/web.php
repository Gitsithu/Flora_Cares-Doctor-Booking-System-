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
    return view('welcome');
});
Route::get('/', 'frontend\ClinicController@index');
Route::get('frontend/clinic/detail/{parameter}',        	array('as'=>'frontend/clinic/detail','uses'=>'frontend\ClinicController@detail'));
Route::get('/home/edit/{parameter}',        	array('as'=>'home/edit','uses'=>'HomeController@edit'));
Route::patch('/home/{id}',      array('as'=>'home/update','uses'=>'HomeController@update'));
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/frontend/search/change/{$parameter}',        			array('as'=>'frontend/search/change','uses'=>'frontend\SearchController@change'));
Auth::routes();

Route::any('/search',        			array('as'=>'search','uses'=>'frontend\SearchController@index'));

Route::get('/frontend/feedback', 'frontend\FeedbackController@index');
// Route::post('/frontend/feedback', 'frontend\FeedbackController@store');
// Route::resource('/feedback', 'frontend\FeedbackController');
Route::post('frontend/feedback/store',        	array('as'=>'frontend/feedback/store','uses'=>'frontend\FeedbackController@store'));

Route::get('/clinic', 'frontend\ClinicController@clinic');
Route::get('frontend/clinic/change/{id}',  array('as'=>'frontend/clinic/change','uses'=>'frontend\ClinicController@change'));
// Appointment
Route::post('frontend/appointment/create/{parameter}',  array('as'=>'frontend/appointment/create','uses'=>'frontend\AppointmentController@create'));
Route::post('/frontend/appointment/getbreed',   	array('as'=>'frontend/appointment/getbreed','uses'=>'frontend\AppointmentController@getbreed'));

Route::post('frontend/appointment/store',        	array('as'=>'frontend/appointment/store','uses'=>'frontend\AppointmentController@store'));

Route::get('contact', function () {
    return view('frontend.contact');
});
Route::get('about', function () {
    return view('frontend.about');
});
Route::get('services', function () {
    return view('frontend.services');
});

Route::get('/token',        			array('as'=>'appointment','uses'=>'frontend\AppointmentController@token'));
Route::get('/appointment',        			array('as'=>'appointment','uses'=>'frontend\AppointmentController@index'));

Route::group(['prefix' => 'backend','middleware' => ['auth']], function (){  

// Animal
// Route::get('/animal',        			array('as'=>'animal','uses'=>'backend\AnimalController@index'));
// Route::get('/animal/create',        	array('as'=>'frontend/animal/create','uses'=>'backend\AnimalController@create'));
// Route::post('/animal/store',        	array('as'=>'frontend/animal/store','uses'=>'backend\AnimalController@store'));
// Route::get('/animal/edit/{parameter}',        	array('as'=>'frontend/animal/edit','uses'=>'backend\AnimalController@edit'));
// Route::patch('/animal/update/{id}',      array('as'=>'frontend/animal/update','uses'=>'backend\AnimalController@update'));
// Route::get('/animal/show/{id}',        	array('as'=>'frontend/animal/show','uses'=>'backend\AnimalController@show'));
Route::get('appointment', 'backend\AppointmentController@index');
Route::get('appointment/adminview', 'backend\AppointmentController@adminview');
Route::post('appointment/{parameter}', 'backend\AppointmentController@reject');
Route::get('appconfirm', 'backend\AppointmentController@appconfirm');
Route::get('appreject', 'backend\AppointmentController@appreject');
Route::get('appointment/{parameter}/confirm', 'backend\AppointmentController@confirm');

Route::get('dashboard',array('as'=>'dashboard','uses'=>'backend\DashboardController@index'));

Route::resource('specialization', 'backend\SpecializationController');

Route::get('/specialization',        			array('as'=>'backend/specialization','uses'=>'backend\SpecializationController@index'));
Route::get('/specialization/create',        	array('as'=>'backend/specialization/create','uses'=>'backend\SpecializationController@create'));
Route::post('/specialization/store',        	array('as'=>'backend/specialization/store','uses'=>'backend\SpecializationController@store'));
Route::get('/specialization/edit/{parameter}',        	array('as'=>'backend/specialization/edit','uses'=>'backend\SpecializationController@edit'));
Route::patch('/specialization/update/{id}',      array('as'=>'backend/specialization/update','uses'=>'backend\SpecializationController@update'));
Route::get('/specialization/show/{id}',        	array('as'=>'backend/specialization/show','uses'=>'backend\SpecializationController@show'));

// Bank
Route::get('/bankinfo',        			array('as'=>'backend/bankinfo','uses'=>'backend\BankController@index'));
Route::get('/bankinfo/create',        	array('as'=>'backend/bankinfo/create','uses'=>'backend\BankController@create'));
Route::post('/bankinfo/store',        	array('as'=>'backend/bankinfo/store','uses'=>'backend\BankController@store'));
Route::get('/bankinfo/{parameter}/edit',        	array('as'=>'backend/bankinfo/edit','uses'=>'backend\BankController@edit'));
Route::patch('/bankinfo/update/{id}',      array('as'=>'backend/bankinfo/update','uses'=>'backend\BankController@update'));
Route::get('/bankinfo/show/{id}',        	array('as'=>'backend/bankinfo/show','uses'=>'backend\BankController@show'));
Route::post('/bankinfo/destroy/{id}',        	array('as'=>'backend/bankinfo/destroy','uses'=>'backend\BankController@destroy'));

// Payment
Route::resource('payment', 'backend\PaymentController');

Route::get('/payment',        			array('as'=>'backend/payment','uses'=>'backend\PaymentController@index'));
Route::post('/payment/create',  array('as'=>'backend/payment/create','uses'=>'backend\PaymentController@create'));
Route::post('/payment/store',        	array('as'=>'backend/payment/store','uses'=>'backend\PaymentController@store'));
Route::get('/payment/{parameter}/edit',        	array('as'=>'backend/payment/edit','uses'=>'backend\PaymentController@edit'));
Route::patch('/payment/update/{id}',      array('as'=>'backend/payment/update','uses'=>'backend\PaymentController@update'));
Route::get('/payment/show/{id}',        	array('as'=>'backend/payment/show','uses'=>'backend\PaymentController@show'));
Route::post('/payment/destroy/{id}',        	array('as'=>'backend/payment/destroy','uses'=>'backend\PaymentController@destroy'));

Route::post('/payment/slip',   	array('as'=>'backend/payment/slip','uses'=>'backend\PaymentController@slip'));

// Clinic
Route::resource('clinic', 'backend\ClinicController');

Route::get('/clinic',        			array('as'=>'backend/clinic','uses'=>'backend\ClinicController@index'));
Route::get('/clinic/create',        	array('as'=>'backend/clinic/create','uses'=>'backend\ClinicController@create'));
Route::get('/clinic/store',        	array('as'=>'backend/clinic/store','uses'=>'backend\ClinicController@store'));
Route::get('/clinic/edit/{parameter}',        	array('as'=>'backend/clinic/edit','uses'=>'backend\ClinicController@edit'));
Route::patch('/clinic/update/{id}',      array('as'=>'backend/clinic/update','uses'=>'backend\ClinicController@update'));
Route::get('/clinic/show/{id}',        	array('as'=>'backend/clinic/show','uses'=>'backend\ClinicController@show'));

Route::get('clinic/{parameter}/add_doctor', 'backend\ClinicController@add_doctor');
Route::get('clinic/{parameter}/inactive', 'backend\ClinicController@inactive');
Route::get('clinic/{parameter}/active', 'backend\ClinicController@active');
Route::get('clinic/{parameter}/delete', 'backend\ClinicController@delete');

Route::post('clinic/doctorstore',  array('as'=>'backend/clinic/doctorstore','uses'=>'backend\ClinicController@doctorstore'));
Route::get('clinic_detail', 'backend\ClinicController@clinic_detail');


// user
Route::resource('user', 'backend\UserController');
Route::get('nopayment', 'backend\UserController@nopayment');




Route::resource('feedback', 'backend\FeedbackController');

//home
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/edit/{parameter}',        	array('as'=>'home/edit','uses'=>'HomeController@edit'));
// Route::patch('/home/{id}',      array('as'=>'home/update','uses'=>'HomeController@update'));

Route::resource('home', 'HomeController');

Route::get('/home',        			array('as'=>'/home','uses'=>'HomeController@index'));
Route::get('/home/create',        	array('as'=>'/home/create','uses'=>'HomeController@create'));
Route::get('/home/store',        	array('as'=>'/home/store','uses'=>'HomeController@store'));
Route::get('/home/edit/{parameter}',        	array('as'=>'/home/edit','uses'=>'HomeController@edit'));
Route::patch('/home/update/{id}',      array('as'=>'/home/update','uses'=>'HomeController@update'));
Route::get('/home/show/{id}',        	array('as'=>'/home/show','uses'=>'HomeController@show'));
Route::get('/home/{parameter}/active',        	array('as'=>'/home/active','uses'=>'HomeController@active'));
Route::get('/home/{parameter}/inactive',        	array('as'=>'/home/inactive','uses'=>'HomeController@inactive'));


// Report
Route::get('report/user',        			array('as'=>'pre_report/user','uses'=>'backend\ReportController@index'));
Route::get('report/appointmentaccept',        			array('as'=>'report/appointmentaccept','uses'=>'backend\ReportController@accept'));
Route::get('report/appointmentdeny',        			array('as'=>'report/appointmentdeny','uses'=>'backend\ReportController@deny'));
Route::get('report/appointmentpending',        			array('as'=>'report/appointmentpending','uses'=>'backend\ReportController@pending'));
Route::get('report/clinic',        			array('as'=>'report/clinic','uses'=>'backend\ReportController@clinic'));
Route::get('report/appointment',        			array('as'=>'report/appointment','uses'=>'backend\ReportController@appointment'));
Route::get('report/appointmentexpire',        			array('as'=>'report/appointmentexpire','uses'=>'backend\ReportController@expire'));

});