<?php

namespace App\Http\Controllers\backend;
use DB;
use Mail;
use Auth;
use App\Mail\PasswordMail;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to select the data from faculty which delected is null
        $specializations=DB::select('SELECT * from specialization where status = 1 and deleted_at is null');

        $user=DB::select('SELECT * from users where deleted_at is null');
        return view('backend.user.create')
        ->with('user',$user)
        ->with('specializations',$specializations);
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
            'name' => 'required|max:225',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|unique:users',
            'specialization_id' => 'required',
            'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            
          
          
            
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $normal=$request->input('password');
        $password = bcrypt($normal);


            $phone = $request->input('phone');
            $address = $request->input('address');
            $description = $request->input('description');
            $role_id = $request->input('role_id');
            if($role_id==1){
    
                $this->validate($request, [
                    'degree' => 'required',
                    'nrc' => 'required|unique:users',
                    'specialization_id' => 'required',
    
        
                ]);
            }
            $nrc   = $request->input('nrc');
            $degree = $request->input('degree');
            $special= $request->input('specialization_id');
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");
            if ($role_id==2){
                $status=2;

            }
            
                
        

            Mail::to($email)->send(new PasswordMail($normal,$email));
           
            DB::insert('insert into users (role_id,name,email,password,phone,address,nrc,specialization_id,description,degree,status,created_at) values(?,?,?,?,?,?,?,?,?,?,?,?)', 
            [$role_id,$name,$email,$password,$phone,$address,$nrc,$special,$description,$degree,$status,$created_at]);    

                $message = 'Success, user registered and email sent successfully ...!';
                $request->session()->flash('success', $message);
    
                    return redirect()->route('home');
        
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

    public function nopayment()
    {
        $loginUser = Auth::user();
        $loginUserId = $loginUser->id;
        return view('backend.user.nopayment')
        ->with('loginUserId',$loginUserId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


