<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function map_users()
    {
        header('Content-Type: application/json; charset=utf-8');

    	$detailers = User::where('user_type','detailer')->get();

    	return response()->json([

    		'success'   => 'true',
    		'status'    => 200,
    		'message'   => 'All Detailers For Map',
    		'detailers' => $detailers
    	]);
    }
    public function get_user_in_map($id)
    {
        header('Content-Type: application/json; charset=utf-8');
            
    	$map_user = User::find($id);

    	return response()->json([

    		'success' => 'true',
    		'status'  => 200,
    		'message' => "User Details",
    		'user'    => $map_user
    	]);
    }

    public function user_details(Request $request)
    {
        $user = User::find(Auth::guard('api')->id());

        if (! $user) 
        {
            return response()->json([

                'status'    => false,
                'code'      => 401,
                'api_token' => "User is not Registered"
            ]);
        } 

        $check = DB::table('car_details')->where('customer_id',$request->customer_id)->first();

        if ($check) 
        {
                $customer_details = DB::table('users')
                            ->join('car_details','car_details.customer_id', '=', 'users.id')
                            ->where('car_details.customer_id', $request->customer_id)
                            ->orderBy('car_details.id','desc')->limit(1)->first();


                $detailer_details = DB::table('car_details')
                                    ->join('users','car_details.detailer_id', '=', 'users.id')
                                    ->where('car_details.customer_id', $request->customer_id)
                                    ->orderBy('car_details.id','desc')->limit(1)->first();

                $user = [
                            "id"                => $customer_details->id,
                            "name"              => $customer_details->name,
                            "email"             => $customer_details->email,
                            "warranty_code"     => $customer_details->warranty_code,
                            "phone_number"      => $customer_details->phone_number,
                            "user_type"         => $customer_details->user_type,
                            "customer_id"       => $customer_details->customer_id,
                            "detailer_id"       => $customer_details->detailer_id,
                            "done_date"         => date('m-d-Y',strtotime($customer_details->done_date)),
                            "license_plate_no"  => $customer_details->license_plate_no,
                            "model"             => $customer_details->model,
                            "year"              => $customer_details->year,
                            "color"             => $customer_details->color,
                            "title"             => $customer_details->title,
                            "edition"           => $customer_details->edition,
                            "addres"            => $customer_details->address,

                            'detailer_name'     => $detailer_details->name,
                            "detailer_email"    => $detailer_details->email,
                            "detailer_phn_nmbr" => $detailer_details->phone_number,
                            "detailer_img"      => $detailer_details->image,
                        ];   

                                
                  return response()->json([

                        'success' => 'true',
                        'status'  => 200,
                        'message' => 'User Details',
                        'user'    => $user  
                  ]);   
        } 
        else 
        {
            return response()->json([

                        'success' => 'true',
                        'status'  => 200,
                        'message' => 'Customer ID Could Not Found',
                  ]);  
        }
    }

    public function get_waranty_code(Request $request)
    {
        header('Content-type:application/json');
        
        $user = User::find(Auth::guard('api')->id());

        if (! $user) 
        {
            return response()->json([

                'status'    => false,
                'code'      => 401,
                'api_token' => "User is not Registered"
            ]);
        }

        $waranty_code = DB::table('subscriptions')
                            ->join('warranty_codes','warranty_codes.car_details_id','=','subscriptions.id')
                            ->where('subscriptions.detailer_id',$request->detailer_id)
                            ->where('warranty_codes.status',0)
                            ->first();

        $codes = 
                [
                    'waranty_code_id' => $waranty_code->id,
                    'detailer_id'     => $waranty_code->detailer_id,
                    'status'          => $waranty_code->status,
                    'warranty_code'   => 'war'.$waranty_code->id,
                ]; 

        if (!empty($waranty_code)) 
        {
            return response()->json([

                        'success'              => 'true',
                        'status'               => 200,
                        'message'              => 'detailer waranty code details',
                        'waranty_code_data'    => $codes  
                  ]); 
        } 
        else 
        {
            return response()->json([

                        'success' => 'false',
                        'status'  => 400,
                        'message' => "We don't found any waranty code, Please buy some more subscriptions",
            ]);
        }                               
    }
}
