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

        $user_details = DB::table('users')
                            ->join('car_details','car_details.customer_id', '=', 'users.id')
                            ->join('users AS user','user.id', '=', 'car_details.detailer_id')
                            ->where('car_details.customer_id', $request->customer_id)
                            ->orderBy('car_details.id','desc')->limit(1)->first();

        dd($user_details);                    


        $user = [
                    "id"                => $user_details->id,
                    "name"              => $user_details->name,
                    "email"             => $user_details->email,
                    "warranty_code"     => $user_details->warranty_code,
                    "phone_number"      => $user_details->phone_number,
                    "user_type"         => $user_details->user_type,
                    "customer_id"       => $user_details->customer_id,
                    "detailer_id"       => $user_details->detailer_id,
                    "done_date"         => date('m-d-Y',strtotime($user_details->done_date)),
                    "license_plate_no"  => $user_details->license_plate_no,
                    "model"             => $user_details->model,
                    "year"              => $user_details->year,
                    "color"             => $user_details->color,
                    "title"             => $user_details->title,
                    "edition"           => $user_details->edition,
                ];   

          return response()->json([

                'success' => 'true',
                'status'  => 200,
                'message' => 'User Details',
                'user'    => $user  
          ]);                     
    }
}
