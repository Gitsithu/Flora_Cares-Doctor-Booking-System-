<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use App\payment;
use App\bank;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        
        $loginUser = Auth::user();
            if ($loginUser->role_id == 1) {
                $obj=DB::select('SELECT distinct p.*,u.name as user_name,u.status as status, b.name as bank_name from payment as p
                        join users as u
                        on p.user_id=u.id
                        join bank as b
                        on p.bank_id=b.id
                         GROUP by b.id,p.id,p.user_id,p.bank_id,p.payment_shot,p.amount,p.pay_date,p.status,p.created_at,p.updated_at,p.deleted_at
                          ,b.name,b.number,b.status,b.created_at,b.updated_at,b.deleted_at,
                          u.name,u.status');

            }
            elseif($loginUser->role_id == 2){
                $loginUserId = $loginUser->id;
                $obj=DB::select('SELECT distinct p.*,u.name as user_name,u.status as status,b.name as bank_name from payment as p
                        join users as u
                        on p.user_id=u.id
                        join bank as b
                          on p.bank_id=b.id
                          where p.user_id= '.$loginUserId.'
                            GROUP by b.id,p.id,p.user_id,p.bank_id,p.payment_shot,p.amount,p.pay_date,p.status,p.created_at,p.updated_at,p.deleted_at
                          ,b.name,b.number,b.status,b.created_at,b.updated_at,b.deleted_at,
                          u.name,u.status');
            }

        $bank=DB::select('SELECT * from bank where deleted_at is null');

       return view('backend.payment.index')
        ->with('bank',$bank)
        ->with('obj',$obj);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment = DB::select('SELECT distinct p.*,b.name as bank_name from payment as p
                                join bank as b
                                on p.bank_id=b.id
                                GROUP by b.id,p.id,p.user_id,p.bank_id,p.payment_shot,p.amount,p.pay_date,p.status,p.created_at,p.updated_at,p.deleted_at
                                ,b.name,b.number,b.status,b.created_at,b.updated_at,b.deleted_at
                                ');

        $bank=DB::select('SELECT * from bank where deleted_at is null');

       return view('backend.user.paymentform')
        ->with('payment',$payment)
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
            'image' => 'required',
            'amount' => 'required|integer|numeric|min:30000|max:30000',
            ]);
        $loginUser=Auth::user();
        $loginUserId=$loginUser->id;
        // $pre_status = DB::table('payment')->select('pay_date')->where('user_id', $loginUserId)->first();
        // $str = strtotime($pre_status->pay_date);

        // $pay = date('d-m-Y', strtotime($str. ' +30 days'));
        // dd($pay);


            $bank = $request->input('bank_id');
            $amount = $request->input('amount');
            $pay = date("Y-m-d");
            $created_at = date("Y-m-d H:i:s");


            try {

                // to create the folder path when it save images
                if ($image = $request->file('image')) {
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('payment'), $new_name);
                    $image_file = "/payment/" . $new_name;
                    DB::insert('insert into payment(user_id,bank_id,payment_shot,amount,pay_date,created_at) values(?,?,?,?,?,?)',
                    [$loginUserId,$bank,$image_file,$amount,$pay,$created_at]);
                } else {
                    DB::insert('insert into payment(user_id,bank_id,amount,pay_date,created_at) values(?,?,?,?,?)',
                    [$loginUserId,$bank,$amount,$pay,$created_at]);
                }

                $smessage = 'Success, Payment successfully ...!';
                $request->session()->flash('success', $smessage);

                // return redirect()->route('backend/car');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                // );

                // to return view
                Auth::logout();

                return redirect()->route(
                    'login'
                );
            } catch (Exception $e) {

                // to show the alert box
                $smessage = 'Fail, Error in Payment ...!';
                $request->session()->flash('fail', $smessage);

                return redirect()->route(
                    'login'
                );
            }
        }

        public function show()
        {
            //
        }


    public function edit($id)
    {
        $id = Crypt::decrypt($id);
         $obj = DB::table('payment')->where('id', $id)->first();
         return view('backend.payment.edit', ['obj' => $obj]);
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

                'payment_shot' => 'required',
                'amount' => 'required',

                ]);

            $updated_at = date("Y-m-d H:i:s");


            try{

                $amount = $request->input('amount');

                // to create the folder path when it save images
                if($image = $request->file('image')){

                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('payment'), $new_name);
                    $image_file = "/payment/" . $new_name;
                    DB::update('update payment set image = ?, amount = ?, updated_at = ? where id = ?', [$image_file,$amount,$updated_at,$id]);
                }
                else{
                    DB::update('update payment set amount = ?, updated_at = ? where id = ?', [$amount,$updated_at,$id]);
                }

                $smessage = 'Success, Payment updated successfully ...!';
                $request->session()->flash('success', $smessage);


                // to return view
                return redirect()->action(
                    'PaymentController@index'
                );
            }
                catch(Exception $e){

                // to show the alert box
                $smessage = 'Fail, Error in Payment updating ...!';
                $request->session()->flash('fail', $smessage);

                return redirect()->action(
                    'PaymentController@index'
                );
            }

     }



}
