<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->products) 
        {
            $products = DB::table('products')->where('title', 'LIKE', '%'.$request->products.'%')->get();

            if ($products->isEmpty()) 
            {
                return response()->json([

                    'success' => 'false',
                    'status'  => '400',
                    'message' => 'No Results Found',
                ]);
            } 
            else {
                return response()->json([

                    'success' => 'true',
                    'status'  => '200',
                    'message' => 'Search Result',
                    'result' => $products
                ]);
            }
        } 
        elseif($request->news_feed)
        {
    	   $news_feed = DB::table('news_feed')->where('content', 'LIKE', '%'.$request->news_feed.'%')->get();

           if ($news_feed->isEmpty()) 
            {
                return response()->json([

                    'success' => 'false',
                    'status'  => '400',
                    'message' => 'No Results Found',
                ]);
            } 
            else {
                   return response()->json([

                        'success' => 'true',
                        'status'  => '200',
                        'message' => 'Search Result',
                        'result' => $news_feed
                    ]);
            }
        }
        elseif ($request->detailer) 
        {
           $detailer = DB::table('users')->where('name', 'LIKE', '%'.$request->detailer.'%')->get();

            if ($detailer->isEmpty()) 
            {
                return response()->json([

                    'success' => 'false',
                    'status'  => '400',
                    'message' => 'No Results Found',
                ]);
            } 
            else {

               return response()->json([

                    'success' => 'true',
                    'status'  => '200',
                    'message' => 'Search Result',
                    'result' => $detailer
                ]);
            }   
        }
        elseif ($request->title) 
        {
           $gallery = DB::table('gallery')->where('title', 'LIKE', '%'.$request->title.'%')->get();

           if ($gallery->isEmpty()) 
            {
                return response()->json([

                    'success' => 'false',
                    'status'  => '400',
                    'message' => 'No Results Found',
                ]);
            } 
            else {

               return response()->json([

                    'success' => 'true',
                    'status'  => '200',
                    'message' => 'Search Result',
                    'result' => $gallery
                ]);
       }
        }
    }
}
