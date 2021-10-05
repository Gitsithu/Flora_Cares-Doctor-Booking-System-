<?php

namespace App\Http\Controllers\frontend;
use Auth;
use DB;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        $loginUser=Auth::user();
        $loginUserId=$loginUser->id;
        $appoint = DB::table('appointment')->distinct('date','day')->where('appointment.user_id', $loginUserId)->get();
        $user = DB::table('users')->get();
        $clinic = DB::table('clinic')->get();

        return view('frontend.appointment.index')
        ->with('appoint',$appoint)
        ->with('user',$user)
        ->with('clinic',$clinic);
    }

    public function create(Request $request,$id)
    {
        $id = Crypt::decrypt($id);
        $doctor_id = $id;
        $clinic_id=$request->input('cid');
        $status = 1;
        $appoint = DB::table('clinic_detail')->where('user_doctor_id', $doctor_id)->where('clinic_id', $clinic_id)->where('status', $status)->where('deleted_at','=', Null)->get();

        return view('frontend.appointment.create')
        ->with('appoint',$appoint)
        ->with('c_id',$clinic_id)
        ->with('doctor_id',$doctor_id);
    }

   public function store(Request $request)
   {


    $this->validate($request, [


        'date' => 'required',


    ]);


    try{
        $loginUser = Auth::user();
        if(!empty($loginUser)) {
        $date = $request->input('date');
        
        $date_now = date("Y-m-d"); 
        // this format is string comparable

        if ($date_now == $date) {
            $successmessage = 'The chosen date must be after today!';
            $request->session()->flash('fail', $successmessage);

            return redirect()->action(
                'frontend\ClinicController@index' );}

        $day = date('l', strtotime($date));
        $user_id = $loginUser->id;
        $doctor_id = $request->input('user_doctor_id');
        $clinic_id = $request->input('clinic_id');
        // $registeredFlag_1 = DB::select('select * from appointment where user_id = ? AND day = ?' ,[$user_id,$day] );
        $registeredFlag = DB::select('select * from appointment where user_id = ? AND user_doctor_id = ? AND date = ?' ,[$user_id,$doctor_id,$date] );

        // if($registeredFlag_1 ) {

        //     $successmessage = 'Error, you have already appointed by that day !';
        //     $request->session()->flash('fail', $successmessage);

        //     return redirect()->action(
        //         'frontend\ClinicController@index' );}

        if($registeredFlag ) {

                $successmessage = 'Error, you have already appointed to this doctor !';
                $request->session()->flash('fail', $successmessage);

                return redirect()->action(
                    'frontend\ClinicController@index' );}
                }
        $date = $request->input('date');
        $day = date('l', strtotime($date));
        $user_id = $loginUser->id;
        $doctor_id = $request->input('user_doctor_id');
        $clinic_id = $request->input('clinic_id');
        $vali = DB::table('clinic_detail')->where('user_doctor_id', $doctor_id)->where('clinic_id', $clinic_id)->where('day',$day)->get();
        $val_count=$vali->count();
        if($val_count>0){
        $created_at = date("Y-m-d H:i:s");


        DB::insert('insert into appointment (user_id,user_doctor_id,clinic_id,date,day,created_at) values(?,?,?,?,?,?)',
                    [$user_id,$doctor_id,$clinic_id,$date,$day,$created_at]);

                    // to alert message when it sucessfully created
        $smessage = 'Success, appointment submitted successfully ...!';
        $request->session()->flash('success', $smessage);


        return redirect()->action(
            'frontend\AppointmentController@index'
        );
    }

        else{
            $smessage = 'Fail, Error in submitting appointment...!';
            $request->session()->flash('fail', $smessage);
            $status=1;
           $objs=DB::select('SELECT distinct id , name,address from clinic
           WHERE status = ' .$status.' AND deleted_at Is Null Group by id,name,address');

            // return redirect()->back()->with('error', 'Something went wrong.')
            return view('welcome')
            ->with('objs',$objs);


            }
    }

    catch(Exception $e){


        // to alert message when it fail creating
        $smessage = 'Fail, Error in submitting appointment...!';
        $request->session()->flash('fail', $smessage);

        return view('welcome');
    }

}
    public function retone($clinic_id,$doctor_id)
    {
        $doctor_id=$doctor_id;
        $clinic_id=$clinic_id;
        $appoint = DB::table('clinic')->where('user_id', $doctor_id)->where('id', $clinic_id)->get();


        return view('frontend.appointment.create')
        ->with('appoint',$appoint)
        ->with('doctor_id',$doctor_id)
        ->with('clinic_id',$clinic_id);

    }
    public function token(){
        $loginUser=Auth::user();
        $loginUserId=$loginUser->id;
        $token = DB::table('token')->distinct('user_doctor_id','clinic_id')->where('token.user_id', $loginUserId)->get();
        $status2 = 0;
        $status = 3;
        $date = date("Y-m-d");
        $registrations = DB::select('update appointment set status = ? where date < ?',[$status,$date]);
        $registrations2 = DB::select('update token set status = ? where date < ?',[$status2,$date]);
        $user = DB::table('users')->get();
        $clinic = DB::table('clinic')->get();
       return view('frontend.appointment.token')
       ->with('token',$token)
       ->with('user',$user)
       ->with('clinic',$clinic);
    }

}
