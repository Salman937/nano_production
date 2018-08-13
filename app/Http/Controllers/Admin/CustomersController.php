<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Session;
use App\Subscription;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $new_details = DB::table('car_details')
            ->select([
                'car_details.*',
                'customers.name as customer_name',
                'customers.email as customer_email',
                'customers.phone_number as customer_phone',
                'customers.warranty_code as customer_warranty_code',
                'detailers.name as detailer_name',
                'detailers.email as detailer_email',
                'detailers.phone_number as detailer_phone',
            ])
            ->join('users as detailers', 'car_details.detailer_id', '=', 'detailers.id')
            ->join('users as customers', 'car_details.customer_id', '=', 'customers.id')
            ->get();
        
        return view('admin.customers.index')
            ->with('heading' , 'customers')
            ->with('detailers' , $new_details);
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
                                      ->where('customer_id',$id)->first();

        // dd($customers);

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
        $user = User::find($id);

        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->phone_number     = $request->ph_no;


        $user->save();

        $car_details = DB::table('car_details')->where('customer_id',$id)->update(
            [
                'license_plate_no' => $request->license_no,
                'model'            => $request->model,
                'year'             => $request->year,
                'color'            => $request->color,
                'title'            => $request->title,
                'edition'          => $request->edition,
            ]
        );

        Session::flash('success','Customer Updated Successfully');

        return redirect()->route('customers.index');
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
