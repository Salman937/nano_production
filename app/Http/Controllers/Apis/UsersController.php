<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;

class UsersController extends Controller
{
    public function map_users()
    {
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
    	$map_user = User::find($id);

    	return response()->json([

    		'success' => 'true',
    		'status'  => 200,
    		'message' => "User Details",
    		'user'    => $map_user
    	]);
    }
}
