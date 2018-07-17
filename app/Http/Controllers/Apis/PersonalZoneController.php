<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PersonalZoneController extends Controller
{
    public function index()
    {
    	$products = DB::table('products')->orderBy('id','desc')->first();

    	$gallery = DB::table('gallery')->orderBy('id','desc')->limit(3)->get();

    	$news_feed = DB::table('news_feed')->orderBy('id','desc')->limit(5)->get();

        $feed = [];

        foreach ($news_feed as $news) 
        {
            $created = \Carbon\Carbon::parse($news->created_at)->diffForHumans(null,true);

            $time = str_replace(['hours', 'minutes'], ['h', 'mins'], $created );

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
    		'gallery_img'  => empty($gallery) ? "products not avail" : $gallery,
    		'news_feed'    => empty($feed) ? "products not avail" : $feed,
    	]);

    }
}
