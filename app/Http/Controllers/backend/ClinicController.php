<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use App\clinic;
use App\clinic_detail;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $objs = DB::table('clinic')->join('users', 'clinic.user_doctor_id', '=', 'users.id')->distinct('clinic.day')->select('users.name as user_name','clinic.name as name', 'clinic.user_doctor_id', 'users.description', 'users.image', 'clinic.day', 'clinic.from_time', 'clinic.to_time', 'clinic.address', 'clinic.status', 'clinic.created_at', 'clinic.updated_at', 'clinic.deleted_at', 'clinic.id')
        // ->groupBy('clinic.name','clinic.user_doctor_id','users.name','users.description', 'users.image', 'clinic.day', 'clinic.from_time', 'clinic.to_time', 'clinic.address', 'clinic.status', 'clinic.created_at', 'clinic.updated_at', 'clinic.deleted_at', 'clinic.id')->get();
         $doctor_id = Auth::id();
        $obj=DB::select('SELECT distinct c.* from clinic_detail as cd join clinic as c
                          on cd.clinic_id=c.id
                          where cd.user_doctor_id ='.$doctor_id.' GROUP by c.id,c.image,c.name,c.address,c.status,c.created_at,c.updated_at,c.deleted_at');
       $objs=DB::select('SELECT * from clinic where deleted_at is null');
     
       return view('backend.clinic.index')
       
        ->with('objs',$objs)
        ->with('obj',$obj);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $doctor=DB::select('SELECT * from users
                            where role_id = 2 and deleted_at is null');
        return view('backend.clinic.create')
        ->with('doctor',$doctor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // to validate form
        
        $this->validate($request, [
            
            'name' => 'required',
            // 'user_doctor_id' => 'required',
            // 'from_time' => 'required',
            // 'to_time' => 'required',
            
            
        ]);
        

        try{
            
            $address = $request->input('address');
            $name = $request->input('name');
            // $user = $request->input('user_doctor_id');
            // $from_time = $request->input('from_time'); 
            // $to_time = $request->input('to_time'); 
            // $date = $request->input('day'); 
            
            // $user_id = count($user);
            
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");

            // for($i=0; $i<$user_id; $i++)
            // {
            //     $a = $user[$i];
                // $b = $date[$i];
                // $c = $from_time[$i];
                // $d = $to_time[$i];
                DB::insert('insert into clinic (name,address,status,created_at) values(?,?,?,?)', 
                        [$name,$address,$status,$created_at]);
            // }
                        // to alert message when it sucessfully created
            $smessage = 'Success, clinic created successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'backend\ClinicController@index'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in Clinic creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\ClinicController@index'
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive(Request $request,$id)
    {
        $id = Crypt::decrypt($id);
        $status = 0;
        $updated_at = date("Y-m-d H:i:s");

        DB::update('update clinic_detail set  status = ?, updated_at = ? where id = ?', [$status,$updated_at,$id]);
        $smessage = 'Success, doctor inactivated successfully ...!';
        $request->session()->flash('success', $smessage);

        return redirect()->action(
            'backend\ClinicController@clinic_detail'
        );

       
    }
    public function active(Request $request,$id)
    {
        $id = Crypt::decrypt($id);
        $status = 1;
        $updated_at = date("Y-m-d H:i:s");

        DB::update('update clinic_detail set  status = ?, updated_at = ? where id = ?', [$status,$updated_at,$id]);
        $smessage = 'Success, doctor activated successfully ...!';
        $request->session()->flash('success', $smessage);

        return redirect()->action(
            'backend\ClinicController@clinic_detail'
        );

       
    }
    public function delete(Request $request,$id)
    {
        //
        $id = Crypt::decrypt($id);
        $status = 1;
        $updated_at = date("Y-m-d H:i:s");
        $detail =clinic_detail::where('id',$id)->first();

        $detail->forcedelete();

        $smessage = 'Success, doctor deleted successfully ...!';
        $request->session()->flash('success', $smessage);

        return redirect()->action(
            'backend\ClinicController@clinic_detail'
        );

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
         $obj = DB::table('clinic')->where('id', $id)->first();
         return view('backend.clinic.edit', ['obj' => $obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            
            'name' => 'required',
            'address'=>'required',
           
        ]);
        $name = $request->input('name');
        $address=$request->input('address');
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
        
        try{
            
          
         DB::update('update clinic set  name = ?,  address = ?, status = ?, updated_at = ? where id = ?', [$name,$address,$status,$updated_at,$id]);
            
           // to alert message when it update successfully
            $smessage = 'Success, Clinic updated successfully ...!';
            $request->session()->flash('success', $smessage);

            return redirect()->action(
                'backend\ClinicController@index'
            );
        }
            catch(Exception $e){
            
                // to alert message when it fail updating
            $smessage = 'Fail, Error in Clinic updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\ClinicController@index'
            );
        }


    }

    public function add_doctor(Request $request,$id){
        $id = Crypt::decrypt($id);
        $doctor=DB::select('SELECT * from users
        where role_id = 2 and deleted_at is null');
        // $obj = DB::table('clinic')->where('id', $id)->first();
        $obj = DB::select('SELECT * from clinic where id = '.$id); 
        return view('backend.clinic.add')
        ->with('obj',$obj)
        ->with('doctor',$doctor);
        
        
    }

    public function doctorstore(Request $request)
    {
        try{
        // to validate form
            $clinic           = $request->input('clinic_id');
            $user = $request->input('user_doctor_id');
            $from_time = $request->input('from_time'); 
            $to_time = $request->input('to_time'); 
            $date = $request->input('day'); 
            
            $user_id = count($user);
            $created_at = date("Y-m-d H:i:s");

            for($i=0; $i<$user_id; $i++)
            {
                $a = $user[$i];
                $b = $date[$i];
                $c = $from_time[$i];
                $d = $to_time[$i];
                DB::insert('insert into clinic_detail (user_doctor_id,clinic_id,from_time,to_time,day,created_at) values(?,?,?,?,?,?)', 
                        [$a,$clinic,$c,$d,$b,$created_at]);

            }


            $smessage = 'Success, clinic created successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'backend\ClinicController@clinic_detail'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in Clinic creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\ClinicController@clinic_detail'
            );
        }

    }

    public function clinic_detail()
    {
        //
         $objs = DB::table('clinic_detail')->join('users', 'clinic_detail.user_doctor_id', '=', 'users.id')->join('clinic', 'clinic_detail.clinic_id', '=', 'clinic.id')->distinct('clinic_detail.clinic_id')->select('users.name as user_name','clinic.name as clinic_name', 'users.description', 'users.image', 'clinic_detail.day', 'clinic_detail.from_time', 'clinic_detail.to_time', 'clinic.address', 'clinic.status', 'clinic_detail.created_at', 'clinic_detail.updated_at','clinic_detail.id','clinic_detail.status')->where('clinic_detail.deleted_at','=', Null)
        ->groupBy('clinic_detail.user_doctor_id','users.name','users.description', 'users.image', 'clinic_detail.day', 'clinic_detail.from_time', 'clinic_detail.to_time', 'clinic.address', 'clinic.status','clinic_detail.created_at','clinic_detail.updated_at', 'clinic.name','clinic_detail.id','clinic_detail.status')->get();
                $doctor=DB::select('SELECT * from users
                        where role_id = 2 and deleted_at is null');
        return view('backend.clinic.clinic_detail')
        ->with('objs',$objs)
        ->with('doctor',$doctor);
    }

    /**->join('users', 'clinic_detail.user_doctor_id', '=', 'users.id')
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // to delect the data from database
        $id = Crypt::decrypt($id);
        $obj = clinic::find($id);
        $obj->delete();
        if ($obj->trashed()) {            
            $message = 'Success, ' . $obj->name .' deleted successfully ...!';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\ClinicController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->name .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\ClinicController@index'
            );
        }
    }
  
}