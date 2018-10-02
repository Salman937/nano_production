<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Subscription;
use Session;

class DetailersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailers = DB::table('users')
                                      ->join('subscriptions','subscriptions.detailer_id','=','users.id')
                                      ->where('user_type','detailer')->get();

        // dd($detailers->toArray());

        return view('admin.detailers.index')
                                            ->with('heading' , 'detailers')
                                            ->with('detailers' , $detailers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[

            'name'         => 'required',
            'email'        => 'required|unique:users,email',
            'ph_no'        => 'required|unique:users,phone_number',
            'subscription' => 'required',
            'file'         => 'required|image',
            'pass'         => 'required',
            'address'      => 'required',
        ]);

        $image = $request->file;

        $new_image = time().$image->getClientOriginalName();

        $image->move('uploads/user_images',$new_image);

        $user = User::create([

            'name'          => $request->name,
            'email'         => $request->email,
            'phone_number'  => $request->ph_no,
            'image'         => 'uploads/user_images/'.$new_image,
            'api_token'     => str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => $request->lat,
            'longitude'     => $request->log,
            'password'      => bcrypt($request->pass),
            'address'       => $request->address,
        ]);

        $subscriber = Subscription::create([

            'detailer_id'             => $user->id,
            'remaining_subscriptions' => 0,
            'detailer_subscriptions'  => $request->subscription,
            'used_subscriptions'      => 0,
        ]);

        for($i=1; $i<=$request->subscription; $i++)
        {
            DB::table('warranty_codes')->insert([

                'car_details_id'   => $subscriber->id,
                'created_at'       => date('Y-m-d H:i:s'),
                'status'           => 0,
            ]);
        }

        Session::flash('success','Deatailer Added Successfully');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $edit = DB::table('users')
                                 ->join('subscriptions','subscriptions.detailer_id','=','users.id')
                                 ->where('detailer_id',$id)->first();

        // dd($edit->name);                         

        return view('admin.detailers.edit')->with('edit',$edit)->with('heading' , 'detailers');                   
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
        // dd($request->toArray());

        $this->validate($request,[

            'name'         => 'required',
            'email'        => 'required|email',
            'ph_no'        => 'required|',
            'subscription' => 'required',
        ]);

        $user = User::find($id);

        if ($request->hasFile('file')) 
        {
            $image = $request->file;

            $new_image = time().$image->getClientOriginalName();

            $image->move('uploads/user_images',$new_image);

            $user->image = 'uploads/user_images/'.$new_image;
        }

            $user->name          = $request->name;
            $user->email         = $request->email;
            $user->phone_number  = $request->ph_no;
            $user->latitude      = $request->lat;
            $user->longitude     = $request->log;
            $user->address       = $request->address;

            $user->save();  
            

        $subscription = Subscription::where('detailer_id', $id)->first();

        $subscription->detailer_subscriptions    = $request->subscription;
        $subscription->remaining_subscriptions   = $request->subscription - $request->used_subscription;

        DB::table('warranty_codes')
                                   ->where('car_details_id',$subscription->id)
                                   ->where('status',0)
                                   ->delete();

        for($i=1; $i<=$request->subscription; $i++)
        {
            DB::table('warranty_codes')->insert([

                'car_details_id'   => $subscription->id,
                'status'           => 0,
                'updated_at'       => date('Y-m-d H:i:s'),
            ]);
        }

        $subscription->save();



        Session::flash('success','Deatailer Updated Successfully');

        return redirect()->route('detailers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_delete = User::find($id);

        $subscription_del = Subscription::where('detailer_id',$id)->first();

        $user_delete->delete();

        $subscription_del->delete();

        Session::flash('success','Detailer Deleted Successfully');

        return redirect()->back();
    }

    public function change_password($id)
    {
        $user = User::find($id);

        // dd($user->toArray());
        return view('admin.detailers.change_password')->with('password',$user)->with('heading' , 'detailers');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $user->password  = bcrypt($request->change_pass);

        $user->save(); 

        Session::flash('success','Detailer Password Updated Successfully');

        return redirect()->route('detailers');
    }
}
