<?php

namespace App\Http\Controllers\frontend;
use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        //
        
        $q = Input::get ( 'q' );
        $user = User::where('name','LIKE','%'.$q.'%')->where('role_id','=','2')->get();
        if(count($user) > 0)
            return view('search')->withDetails($user)->withQuery ( $q );
        else return view ('search')->withMessage('No Details found. Try to search again !');
    }

}
