<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('users')
                                      ->join('car_details','car_details.customer_id','=','users.id')
                                      ->where('user_type','customer')->get();

        // dd($customers->toArray());

        return view('admin.customers.index')
                                            ->with('heading' , 'customers')
                                            ->with('customers' , $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $customers = DB::table('users')
                                      ->join('car_details','car_details.customer_id','=','users.id')
                                      ->where('customer_id',$id)->get();

        return view('admin.customers.edit')
                                            ->with('heading' , 'customers')
                                            ->with('customer' , $customers);
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
        $user_delete = User::find($id);

        $customer_del = DB::table('car_details')->where('customer_id',$id)->delete();

        $user_delete->delete();

        Session::flash('success','Customer Deleted Successfully');

        return redirect()->back();
    }
}
