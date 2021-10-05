<?php

namespace App\Http\Controllers\backend;

use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(){
        $doctor_id = Auth::id();
        $appoint = DB::table('appointment')->distinct('date','day')->where('user_doctor_id', $doctor_id)->where('status',0)->get();
        $user = DB::table('users')->get();
        $clinic = DB::table('clinic')->get();
        $status = 3;
        $status2 = 0;
        $date = date("Y-m-d");
        $registrations = DB::select('update appointment set status = ? where date < ?',[$status,$date]);
        $registrations2 = DB::select('update token set status = ? where date < ?',[$status2,$date]);                 
        
        return view('backend.appointment.index')
        ->with('appoint',$appoint)
        ->with('user',$user)
        ->with('clinic',$clinic);
                                
    }

    public function adminview(){
        $doctor_id = Auth::id();
        $appoint = DB::table('appointment')->distinct('date','day')->get();
        $user = DB::table('users')->get();
        $clinic = DB::table('clinic')->get();
        $status = 3;
        $status2 = 0;
        $date = date("Y-m-d");
        $registrations = DB::select('update appointment set status = ? where date < ?',[$status,$date]);
        $registrations2 = DB::select('update token set status = ? where date < ?',[$status2,$date]);                 
        
        return view('backend.appointment.index')
        ->with('appoint',$appoint)
        ->with('user',$user)
        ->with('clinic',$clinic);
                                
    }

    public function confirm(Request $request,$id){
        $id = Crypt::decrypt($id);
        $appoint = DB::table('appointment')->where('id', $id)->get();
        
        try{
            foreach($appoint as $app){
            $user_id = $app->user_id;   
            $user_doctor_id = $app->user_doctor_id;
            $clinic_id = $app->clinic_id;
            $date = $app->date;
            }
            $vali  = DB::table('token')->where('clinic_id', $clinic_id)->where('date',$date)->where('user_doctor_id',$user_doctor_id)->get();
            $val=$vali->count();
            $valcount= $val+1;
            
            $created_at = date("Y-m-d H:i:s");

            DB::insert('insert into token (token_number,user_id,user_doctor_id,clinic_id,date,created_at) values(?,?,?,?,?,?)', 
                        [$valcount,$user_id,$user_doctor_id,$clinic_id,$date,$created_at]);

            $status = 1;
                
            DB::update('update appointment set status = ? where id = ?',[$status,$id]);
            
 
                        // to alert message when it sucessfully created
            $smessage = 'Success, Appointment confirmed successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'backend\AppointmentController@index'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in Appointment confirming ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\AppointmentController@index'
            );
        }
    }

    public function reject(Request $request,$id){
        $id = Crypt::decrypt($id);
        
        try{
        

            $status = 2;
                
            DB::update('update appointment set status = ? where id = ?',[$status,$id]);
            
 
                        // to alert message when it sucessfully created
            $smessage = 'Success, Appointment rejected successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'backend\AppointmentController@index'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in Appointment rejecting ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\AppointmentController@index'
            );
        }
    }


    public function appconfirm(){

        $doctor_id = Auth::id();
        $appoint = DB::table('appointment')->distinct('date','day')->where('user_doctor_id', $doctor_id)->where('status',1)->get();
        $user = DB::table('users')->get();
        $clinic = DB::table('clinic')->get();
        $status = 3;
        $status2 = 0;
        $date = date("Y-m-d");

        $registrations = DB::select('update appointment set status = ? where date < ?',[$status,$date]);
        $registrations2 = DB::select('update token set status = ? where date < ?',[$status2,$date]);                 
        
        return view('backend.appointment.confirm')
        ->with('appoint',$appoint)
        ->with('user',$user)
        ->with('clinic',$clinic);
                                
    }
    public function appreject(){

        $doctor_id = Auth::id();
        $appoint = DB::table('appointment')->distinct('date','day')->where('user_doctor_id', $doctor_id)->where('status',2)->get();
        $user = DB::table('users')->get();
        $clinic = DB::table('clinic')->get();
        $status = 3;
        $status2 = 0;
        $date = date("Y-m-d");

        $registrations = DB::select('update appointment set status = ? where date < ?',[$status,$date]);
        $registrations2 = DB::select('update token set status = ? where date < ?',[$status2,$date]);                 
        
        return view('backend.appointment.reject')
        ->with('appoint',$appoint)
        ->with('user',$user)
        ->with('clinic',$clinic);
                                
    }
}
