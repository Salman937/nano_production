<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Subscription;
use DB;

class ApplicationDoneController extends Controller
{
    public function applicants(Request $request)
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

    	$remaining_subscription = Subscription::where('detailer_id',$request->detailer_id)->first();

    	$application_done = DB::table('users')
    	                        ->join('car_details','car_details.customer_id', '=' ,'users.id')
    	                        ->where('car_details.detailer_id', $request->detailer_id)
    	                        ->get();


    	$applicants = [];

    	foreach ($application_done as $app_done) 
    	{
    		$applicants[] = 
    						[
							    "name"       	 => $app_done->name,
							    "email"		     => $app_done->email,
							    "warranty_code"  => $app_done->warranty_code,
							    "phone_number"	 => $app_done->phone_number,
							    "user_type"		 =>	$app_done->user_type,
							    "customer_id"    => $app_done->customer_id,
							    "detailer_id"	 => $app_done->detailer_id,
							    "done_date"		 => date('m-d-Y',strtotime($app_done->done_date)),
							    "license_plate_no" => $app_done->license_plate_no,
							    "model"			 => $app_done->license_plate_no,
							    "year"			 => $app_done->year,
							    "color"		     => $app_done->color,
							    "title"			 => $app_done->title,
							    "edition"		 => $app_done->edition,	
    						];
    	}

    	return response()->json([

    		'success'  => 'true',
    		'status'   => 200,
    		'message'  => 'Total subscriptions, remaining subscription and applications done by detailer',
    		'subscriptions' => $remaining_subscription,
    		'applications_done' => $applicants
    	]);
    }													
}
