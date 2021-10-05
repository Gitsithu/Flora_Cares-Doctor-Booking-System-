<?php

namespace App\Http\Controllers\frontend;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check the user's login
        $loginUser = Auth::user();

        // condition the status of clinic_detail and selected that is equal to null      
           $status=1;
           $objs=DB::select('SELECT distinct id , name,address from clinic
           WHERE status = ' .$status.' AND deleted_at Is Null Group by id,name,address');  

            $status2 = 0;
            $status3 = 3;
            $date = date("Y-m-d");
            $registrations = DB::select('update appointment set status = ? where date < ?',[$status3,$date]);
            $registrations2 = DB::select('update token set status = ? where date < ?',[$status2,$date]); 

       
       return view('welcome')
       ->with('objs',$objs);
      

     
    }
    public function clinic()
    {
        // check the user's login
        $loginUser = Auth::user();

        // condition the status of clinic and selected that is equal to null      
           $status=1;
           $objs=DB::select('SELECT distinct id , name,address from clinic
           WHERE status = ' .$status.' AND deleted_at Is Null Group by id,name,address');  
       
       return view('frontend.clinic')
       ->with('objs',$objs);
      

     
    }

    public function change($id)

    {
        $id = Crypt::decrypt($id);
        $objs = DB::select('SELECT distinct cd.clinic_id,c.name as name,c.id as id from clinic_detail as cd 
                            join clinic as c
                            on cd.clinic_id=c.id
                            where cd.user_doctor_id='.$id.' Group by cd.clinic_id,c.name,c.id');
        return view('frontend.clinic')
        ->with('objs',$objs);
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $id = Crypt::decrypt($id);
      $specializations=DB::select('SELECT * from specialization where deleted_at is null');
      $status = 1;
      $objs = DB::table('clinic_detail')->join('users', 'clinic_detail.user_doctor_id', '=', 'users.id')
      ->distinct('clinic_detail.user_doctor_id')->select('users.name','users.specialization_id', 'clinic_detail.user_doctor_id', 'users.description', 'users.image')
      ->where('clinic_detail.clinic_id', $id)->where('clinic_detail.status', $status)
      ->where('clinic_detail.deleted_at','=', Null)
      ->groupBy('clinic_detail.user_doctor_id', 'users.name','users.specialization_id', 'clinic_detail.user_doctor_id', 'users.description', 'users.image')->get();
      $clinic=$id;               
    return view('frontend.clinic_detail')
       ->with('objs',$objs)
       ->with('specializations',$specializations)
       ->with('clinic',$clinic);
      
   }
}