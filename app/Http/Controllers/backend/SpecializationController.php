<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use App\Specialization;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class SpecializationController extends Controller
{
    public function index()
    {
        // to select data of faculty and academic_year table it join with foreign id which is also faculty delected is null
       $objs=DB::select('SELECT * from specialization where deleted_at is null');
     
       return view('backend.specialization.index')
       
        ->with('objs',$objs);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to select delected coulmn from academin year which is equal to null
        $specialization=DB::select('SELECT * from specialization where deleted_at is null');
        return view('backend.specialization.create')
        ->with('specialization',$specialization);
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
            
            
        ]);
        

        try{
            $type = $request->input('name');   
            
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");

            DB::insert('insert into specialization (name,status,created_at) values(?,?,?)', 
                        [$type,$status,$created_at]);

                        // to alert message when it sucessfully created
            $smessage = 'Success, Specialization created successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'backend\SpecializationController@index'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in Specialization creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\SpecializationController@index'
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
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
         $obj = DB::table('specialization')->where('id', $id)->first();
         return view('backend.specialization.edit', ['obj' => $obj]);
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
        //to validate form
        $this->validate($request, [
            
            'name' => 'required',
           
        ]);
        $type = $request->input('name');
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
        
        try{
            
          
         DB::update('update specialization set  name = ?, status = ?, updated_at = ? where id = ?', [$type,$status,$updated_at,$id]);
            
           // to alert message when it update successfully
            $smessage = 'Success, Specialization updated successfully ...!';
            $request->session()->flash('success', $smessage);

            return redirect()->action(
                'backend\SpecializationController@index'
            );
        }
            catch(Exception $e){
            
                // to alert message when it fail updating
            $smessage = 'Fail, Error in Specialization updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\SpecializationController@index'
            );
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // to delect the data from database
        $obj = Specialization::find($id);
        $obj->delete();
        if ($obj->trashed()) {            
            $message = 'Success, ' . $obj->type .' deleted successfully ...!';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\SpecializationController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->type .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\SpecializationController@index'
            );
        }
    }
  
    }
