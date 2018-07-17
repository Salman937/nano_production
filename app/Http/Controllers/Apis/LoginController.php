<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->email == null && $request->password == null) 
    	{
    		$validator = Validator::make($request->all(),[

	    		'warranty_code' => 'required|max:191',
	    		'phone_number' 	=> 'required',

	    	]);


	    	if ($validator->fails()) 
	    	{
	    		return response()->json([

	    			'success' => 'false',
	    			'status'  => '401',
	    			'message' => 'Please Review All Fields',
	    			'errors'  => $validator->errors()
	    		]);
	    	} 

	    	$check_user = User::where('warranty_code',$request->warranty_code)
	    	                  ->where('phone_number', $request->phone_number)->first();

	    	// dd($check_user->toArray());                  

	    	if($check_user)
	    	{
	    		//Authentication Passed
	    		$check_user->api_token = str_random(60);

	    		$check_user->save();

	    		return response()->json([
	    			'success'   => 'true',
	    			'status'    => '200',
	    			'message'   => 'User LoggedIn Successfully',
	    			'user_data' => $check_user
	    		]);

	    	}	

	    	return response()->json([

	    		'success' => 'false',
	    		'status'  => '401',
	    		'message' => 'Your Email OR Password is Incorrect'
	    	]);
    	} 
    	else 
    	{
    		$validator = Validator::make($request->all(),[

	    		'email' 	=> 'required|email:max:191',
	    		'password' 	=> 'required',

	    	]);


	    	if ($validator->fails()) 
	    	{
	    		return response()->json([

	    			'success' => 'false',
	    			'status'  => '401',
	    			'message' => 'Please Review All Fields',
	    			'errors'  => $validator->errors()
	    		]);
	    	} 

	    	if(Auth::attempt([ 'email' => $request->email , 'password' => $request->password]))
	    	{
	    		//Authentication passed
	    		
	    		$user = Auth::user();
	    		
	    		$user->api_token = str_random(60);

	    		$user->save();

	    		return response()->json([
	    			'success'   => 'true',
	    			'status'    => '200',
	    			'message'   => 'User LoggedIn Successfully',
	    			'user_data' => $user
	    		]);

	    	}	

	    	return response()->json([

	    		'success' => 'false',
	    		'status'  => '401',
	    		'message' => 'Your Email OR Password is Incorrect'
	    	]);
    	}
    }
}
