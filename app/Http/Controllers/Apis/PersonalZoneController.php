<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PersonalZoneController extends Controller
{
    public function index()
    {
        header('Content-Type: application/json; charset=utf-8');
        
    	$products = DB::table('products')->orderBy('id','desc')->first();

    	$news_feed = DB::table('news_feed')->orderBy('id','desc')->limit(15)->get();

        $feed = [];

        foreach ($news_feed as $news) 
        {
            $created = \Carbon\Carbon::parse($news->created_at)->diffForHumans(null,true);

            $time = str_replace(['hours', 'minutes','week'], ['h', 'mins','w'], $created );

            $feed[] = [
                        "id"        => $news->id,
                        "name"      => $news->name,
                        "image"     => $news->image,
                        "content"   => $news->content,
                        "time"      => $time
                      ];             
        }

    	return response()->json([

    		'success' 	   => 'true',
    		'status' 	   => '200',
    		'products'     => empty($products) ? "products not avail" : $products,
    		'news_feed'    => empty($feed) ? "products not avail" : $feed,
    	]);

    }
}
