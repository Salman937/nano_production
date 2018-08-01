<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $detailers = DB::table('users')->where('user_type' , 'detailer')->count();
        $customers = DB::table('users')->where('user_type' , 'customer')->count();
        $subscription = DB::table('subscriptions')->count();
        $products = DB::table('products')->count();
        $news_feed = DB::table('news_feed')->count();

        return view('admin.index')->with('users',$users)
                                  ->with('detailers',$detailers)
                                  ->with('customers', $customers)
                                  ->with('subscription', $subscription)
                                  ->with('products', $products)
                                  ->with('news_feed', $news_feed);
    }
}
