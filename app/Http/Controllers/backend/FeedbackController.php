<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use App\feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        $comments = DB::select('SELECT f.*,u.name as user_name,c.name as clinic_name from feedback as f
                                join users as u
                                on f.user_doctor_id=u.id
                                join clinic as c
                                on f.clinic_id=c.id
                                where u.role_id=2');

        $clinic = DB::select('select * from clinic');


        return view('backend.feedback.index')
        ->with('users',$users)
        ->with('clinic',$clinic)
        ->with('comments',$comments);
    }
}
