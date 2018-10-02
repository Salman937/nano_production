<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductsController extends Controller
{
    public function index()
    {
        header('Content-Type: application/json; charset=utf-8');
        
    	$products = DB::table('products')->get();

    	return response()->json([

    		'success'  => 'ture',
    		'status'   => '200',
    		'message'  => 'All Products',
    		'products' => $products
    	]); 
    }
    public function product($id)
    {
        header('Content-Type: application/json; charset=utf-8');
        
    	$product = DB::table('products')->find($id);

    	return response()->json([

    		'success' => 'true',
    		'status'  => '200',
    		'message' => 'Product Details',
    		'product' => $product
    	]);
    }

    public function gallery()
    {
        $gallery = DB::table('gallery')->get();

        $new_gallery = [];

        foreach ($gallery as $gal) 
        {
            $img = explode("|", $gal->gallery_images);
            $item = $gal;
            $item->no_of_images = count(array_filter($img)); 
            $new_gallery[] = $item;
        }

        return response()->json([

            'success' => 'true',
            'status'  => '200',
            'message' => 'Albums',
            'albums'  => $new_gallery
        ]); 
    }

    public function gallery_images($id)
    {
        $images = DB::table('gallery')->where('id',$id)->first();

        $arr = explode("|", $images->gallery_images);

        foreach ($arr as $value) 
        {
            
        }
        dd($arr);

        return response()->json([

            'success' => 'true',
            'status'  => '200',
            'message' => 'Gallery Images',
            'images'  => $arr
        ]); 
    }
}
