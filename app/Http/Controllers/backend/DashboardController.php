<?php
namespace App\Http\Controllers\backend;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

            if (Auth::check()) {

            
              // Start - Searching clinic Count Process
                  $clinic_count_raw = DB::select('SELECT count(id) AS clinic_count from clinic where status = 1');

                  if (isset($clinic_count_raw) && count($clinic_count_raw)>0) {
                      $clinic_count = $clinic_count_raw[0]->clinic_count;
                  } else {
                      $clinic_count = 0;
                  }

                  // to count the total number of users
                  $total_count_raw = DB::select('SELECT count(id) AS total_count from users where status = 1 and deleted_at is null');

                  if (isset($total_count_raw) && count($total_count_raw)>0) {
                      $total_count = $total_count_raw[0]->total_count;
                  } else {
                      $total_count = 0;
                  }

                  // to count the number of doctor
                  $user_count_raw = DB::select('SELECT count(id) AS user_count from users where role_id = 2');

                  if (isset($user_count_raw) && count($user_count_raw)>0) {
                      $user_count = $user_count_raw[0]->user_count;
                  } else {
                      $user_count = 0;
                  }

                  // to count the number of customer
                  $user_count_raws = DB::select('SELECT count(id) AS user_counts from users where role_id = 3');

                  if (isset($user_count_raws) && count($user_count_raws)>0) {
                      $user_counts = $user_count_raws[0]->user_counts;
                  } else {
                      $user_counts = 0;
                  }

                  // to count the number of Customer' appointment
                  $appointment_count_raw = DB::select('SELECT count(id) AS appointment_count from appointment where deleted_at is null');

                  if (isset($appointment_count_raw) && count($appointment_count_raw)>0) {
                      $appointment_count = $appointment_count_raw[0]->appointment_count;
                  } else {
                      $appointment_count = 0;
                  }

                  // to count the number of Customer' appointment
                  $appointment_count_raws = DB::select('SELECT count(id) AS appointment_counts from appointment where status = 1 and deleted_at is null');

                  if (isset($appointment_count_raws) && count($appointment_count_raws)>0) {
                      $appointment_counts = $appointment_count_raws[0]->appointment_counts;
                  } else {
                      $appointment_counts = 0;
                  }


                  $loginUser = Auth::user();
                  $loginUserId = $loginUser->id ;



                 $users = DB::select('select * from users');



                  return view('backend.dashboard')
                  ->with('users', $users)
                  ->with('clinic_count', $clinic_count)
                  ->with('total_count', $total_count)
                  ->with('user_count', $user_count)
                  ->with('user_counts', $user_counts)
                  ->with('appointment_count', $appointment_count)
                  ->with('appointment_counts', $appointment_counts);
                //   ->with('submission_countss', $submission_countss)


              }
              else{
                  return redirect()->route('login');
              }

           }
        }
