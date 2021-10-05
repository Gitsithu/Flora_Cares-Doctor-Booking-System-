<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use App\bank;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankController extends Controller
{
    public function index()
    {
        // to select data of faculty and academic_year table it join with foreign id which is also faculty delected is null
       $objs=DB::select('SELECT * from bank where deleted_at is null');
     
       return view('backend.bankinfo.index')
       
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
        $bank=DB::select('SELECT * from bank where deleted_at is null');
        return view('backend.bankinfo.create')
        ->with('bank',$bank);
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
            'number' => "required|min:11",
            'user_name' => "required",
            
        ]);
        

        try{
            $type = $request->input('name');
            $user_name = $request->input('user_name'); 
            $number = $request->input('number');   
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");

            DB::insert('insert into bank (name,user_name,number,status,created_at) values(?,?,?,?,?)', 
                        [$type,$user_name,$number,$status,$created_at]);

                        // to alert message when it sucessfully created
            $smessage = 'Success, Bank created successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'backend\BankController@index'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in Bank creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\BankController@index'
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
         $obj = DB::table('bank')->where('id', $id)->first();
         return view('backend.bankinfo.edit', ['obj' => $obj]);
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
            'number' => 'required',
            'user_name' => 'required',
           
        ]);
        $type = $request->input('name');
        $number = $request->input('number');
        $user_name = $request->input('user_name');   
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
        
        try{
            
          
         DB::update('update bank set  name = ?,  user_name = ?, number = ?, status = ?, updated_at = ? where id = ?', [$type,$user_name,$number,$status,$updated_at,$id]);
            
           // to alert message when it update successfully
            $smessage = 'Success, Bank updated successfully ...!';
            $request->session()->flash('success', $smessage);

            return redirect()->action(
                'backend\BankController@index'
            );
        }
            catch(Exception $e){
            
                // to alert message when it fail updating
            $smessage = 'Fail, Error in Bank updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\BankController@index'
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
        $obj = bank::find($id);
        $obj->delete();
        if ($obj->trashed()) {            
            $message = 'Success, ' . $obj->name .' deleted successfully ...!';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\BankController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->name .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\BankController@index'
            );
        }
    }
  
    }
