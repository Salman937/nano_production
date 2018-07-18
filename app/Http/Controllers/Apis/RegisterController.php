<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;
use App\User;
use App\Subscription;

class RegisterController extends Controller
{
    public function register(Request $request)
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

    	$validator = Validator::make($request->all(),[

    		'name' 			   => 'required|string',
    		'warranty_code'    => 'required|string|min:6|max:191|unique:users,warranty_code',
    		'phone_number'     => 'required',
    		'done_date'        => 'required',
    		'license_plate_no' => 'required',
    		'model' 		   => 'required',
    		'year' 			   => 'required',
    		'color' 		   => 'required',
    		'title' 		   => 'required',
    		'edition' 	       => 'required',
    		'detailer_id'      => 'required|integer' 
    	]);

    	if ($validator->fails()) 
    	{
    		return response()->json([

    			'success' => 'false',
    			'status'  => 401,
    			'message' => "Please Review for All Fields",
    			'errors'  => $validator->errors()
    		]);
    	} 

    	$user = User::create([

    		'name' 			=> $request->name,
    		'warranty_code' => $request->warranty_code,
    		'phone_number'  => $request->phone_number,
    		'password'  	=> bcrypt(str_random(5)),
    		'user_type'  	=> 'customer',
    		'api_token'  	=> str_random(60),
    		'email'     	=> $request->warranty_code.'@gmail.com',
    	]);

    	DB::table('car_details')->insert([

    		'customer_id' 		=> $user->id,
    		'done_date' 		=> date('Y-m-d',strtotime($request->done_date)),
    		'license_plate_no'  => $request->license_plate_no,
    		'model'  			=> $request->model,
    		'year'  			=> $request->year,
    		'color'  			=> $request->color,
    		'title'  			=> $request->title,
    		'edition'  			=> $request->edition,
    		'detailer_id'       => $request->detailer_id
    	]);

    	$subscriber = Subscription::where('detailer_id',$request->detailer_id)->first();

    	$subscriber->remaining_subscriptions = $subscriber->remaining_subscriptions + 1;
    	$subscriber->detailer_subscriptions  = $subscriber->detailer_subscriptions  - 1;

    	$subscriber->save();

    	return response()->json([

    		'success' => 'true',
    		'status'  => 200,
    		'message' => 'User Created Succssfully',
    	]);

    }
}