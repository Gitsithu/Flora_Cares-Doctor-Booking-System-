<?php

namespace App\Http\Controllers\frontend;
use Auth;
use DB;
use App\feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        $loginUser=Auth::user();
        $loginUserId=$loginUser->id;

        $users= DB::select('select name,id from users where id='. $loginUserId);

        $comments = DB::select('SELECT c.name as clinic_name,u.name as user_name from clinic_detail as cd
                            join users as u
                            on cd.user_doctor_id=u.id
                            Join clinic as c
                            on cd.clinic_id=c.id
                            where cd.deleted_at is null');
        $doctor = DB::select('select *from users where role_id=2');
        $clinic = DB::select('select * from clinic');

        return view('/frontend/feedback')
        ->with('doctor',$doctor)
        ->with('clinic',$clinic)
        ->with('users',$users)
        ->with('comments',$comments);
    }

    public function store(Request $request)
    {

    $this->validate($request, [

            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'feedback' => 'required',
    ]);


    try{

        $loginUser = Auth::user();
        $user_id = $loginUser->id;

        $email = $request->input('email');
        $doctor_id = $request->input('user_doctor_id');

        $clinic_id = $request->input('clinic_id');

        $phone = $request->input('phone');
        $feedback = $request->input('feedback');

        $created_at = date("Y-m-d H:i:s");


        DB::insert('insert into feedback (email,user_id,user_doctor_id,clinic_id,phone,feedback,created_at) values(?,?,?,?,?,?,?)',
                    [$email,$user_id,$doctor_id,$clinic_id,$phone,$feedback,$created_at]);

                    // to alert message when it sucessfully created
        $smessage = 'Success, feedback submitted successfully ...!';
        $request->session()->flash('success', $smessage);


        return redirect()->action(
            'frontend\FeedbackController@index'
        );

    }

    catch(Exception $e){

        // to alert message when it fail creating
        $smessage = 'Fail, Error in submitting feedback...!';
        $request->session()->flash('fail', $smessage);

        return redirect()->action(
            'frontend\FeedbackController@index'
        );
    }

}

}
