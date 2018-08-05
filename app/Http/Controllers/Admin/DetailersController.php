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
            'email'        => 'required|email',
            'ph_no'        => 'required',
            'subscription' => 'required',
            'file'         => 'required|image',
            'pass'         => 'required',
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
            'password'      => $request->pass
        ]);

        Subscription::create([

            'detailer_id'             => $user->id,
            'remaining_subscriptions' => 0,
            'detailer_subscriptions'  => $request->subscription,
        ]);

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
            'ph_no'        => 'required',
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

            $user->save();  

            

        $subscription = Subscription::where('detailer_id', $id)->first();

        $subscription->detailer_subscriptions  = $request->subscription;

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
}
