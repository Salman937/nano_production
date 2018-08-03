<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$news_feed = DB::table('news_feed')->where('content', 'LIKE', '%'.$request->search.'%')->get();


    	return response()->json([

    		'success' => 'true',
    		'status'  => '200',
    		'message' => 'Search Result',
    		'result' => $news_feed
    	]);
    }
}
