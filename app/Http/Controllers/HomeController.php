<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loginUser = Auth::user();
            if ($loginUser->role_id == 1) {
                $objs=DB::select('SELECT * from users');
                $payment=DB::select('SELECT distinct p.* from payment as p group by p.id,p.user_id,p.bank_id,p.payment_shot,p.amount,p.pay_date,p.status,p.created_at,p.updated_at,p.deleted_at');

            }
            elseif($loginUser->role_id == 2){
                $loginUserId = $loginUser->id;
                $objs=DB::select('Select * from users where id='.$loginUserId);
            }

            else{
                $loginUserId = $loginUser->id;
                $objs=DB::select('SELECT * from users
                where id='.$loginUserId);


            }
            return view('home')
            // ->with('payment', $payment)
            ->with('objs', $objs);
     }
     public function edit($id)
        {
            $id = Crypt::decrypt($id);

            $user = DB::select('select * from users where id = ?',[$id]);
            $user2 = DB::table('users')->where('id', $id)->first();
            $specializations=DB::select('SELECT * from specialization where deleted_at is null');

            // to return the variables to the view
            return view('backend.user.edit')
            ->with('user',$user)
            ->with('specializations',$specializations)
            ->with('user2',$user2);
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
            // to validate form
            $this->validate($request,[

                'name' => 'required',
                'email' => 'required|email|unique:users,email,'. $id .'',
                'password' => 'required|min:8|confirmed',
                'phone' => 'required|min:8|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',


                ]);

            $name = $request->input('name');
            $email = $request->input('email');
            $password = bcrypt($request->input('password'));
            $phone = $request->input('phone');
            $nrc   = $request->input('nrc');
            $degree = $request->input('degree');
            $special= $request->input('specialization_id');
            $address = $request->input('address');
            $description = $request->input('description');
            $updated_at = date("Y-m-d H:i:s");


            try{

                // to create the folder path when it save images
                if($image = $request->file('image')){

                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('profile'), $new_name);
                    $image_file = "/profile/" . $new_name;
                    DB::update('update users set  name = ?, email = ?,  password = ?, phone = ?, address = ?, nrc = ?, specialization_id = ?, description = ?, degree = ?, image = ?, updated_at = ? where id = ?', [$name,$email,$password,$phone,$address,$nrc,$special,$description,$degree,$image_file,$updated_at,$id]);
                }
                else{
                    DB::update('update users set  name = ?, email = ?,  password = ?, phone = ?, address = ?, nrc = ?, specialization_id = ?, description = ?, degree = ?, updated_at = ? where id = ?', [$name,$email,$password,$phone,$address,$nrc,$special,$description,$degree,$updated_at,$id]);
                }

                $smessage = 'Success, user updated successfully ...!';
                $request->session()->flash('success', $smessage);

                // return redirect()->route('backend/car');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                // );

                // to return view
                return redirect()->action(
                    'HomeController@index'
                );
            }
                catch(Exception $e){

                // to show the alert box
                $smessage = 'Fail, Error in user updating ...!';
                $request->session()->flash('fail', $smessage);

                return redirect()->action(
                    'HomeController@index'
                );
            }

     }

     public function active(Request $request,$id){
        
        try{


            $id = Crypt::decrypt($id);

            $status = 1;
                
            DB::update('update users set status = ? where id = ?',[$status,$id]);
            

                        // to alert message when it sucessfully created
            $smessage = 'Success, User Active successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'HomeController@index'
            );
        }

        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in User Active ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'HomeController@index'
            );
            
        }
    }

    public function inactive(Request $request,$id){
        try{

            $id = Crypt::decrypt($id);

            $status = 2;
                
            DB::update('update users set status = ? where id = ?',[$status,$id]);
            
 
                        // to alert message when it sucessfully created
            $smessage = 'Success, User Inactive successfully ...!';
            $request->session()->flash('success', $smessage);


            return redirect()->action(
                'HomeController@index'
            );
        }

        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in User Inactive ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'HomeController@index'
            );
            
        }
    }



    }
