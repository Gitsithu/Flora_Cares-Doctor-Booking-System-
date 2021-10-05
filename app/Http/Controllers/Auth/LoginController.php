<?php

namespace App\Http\Controllers\Auth;
use DB;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     * condition sit yamen exmaple login==1 2 3
     */


    // protected $redirectTo = '/backend/dashboard';

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function authenticated(Request $request, $user)
    {
        $loginUser=Auth::user();
        $loginUserId=$loginUser->id;
        $pre_status = DB::table('payment')->select('pay_date')->where('user_id', $loginUserId)->first();
        if($pre_status != null){
            $str = strtotime($pre_status->pay_date);
            
            $time = date('Y-m-d',$str);
            $pay= date('Y-m-d', strtotime($time. ' + 30 days'));


            $tdy = date('Y-m-d');
        if($tdy > $pay)
        {
            $status = 2;
            $updated_at = date("Y-m-d H:i:s");
            DB::update('update users set  status = ?, updated_at = ? where id = ? ', [$status,$updated_at,$loginUserId]);
            return redirect('/backend/nopayment');


        
        }
    }
    

        if($user->role_id == 3) {
            return redirect('/');

        }
        elseif($user->role_id==2 && $user->status==1){
            return redirect('/backend/dashboard');
        }
        elseif($user->role_id==1){
            return redirect('/backend/dashboard');
        }
        else{
            // Auth::logout();

            return redirect('/backend/nopayment');
        }
    
            }/**
        
     * Create a new controller instance.
     *
     * @return void
     */



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}