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

        return response()->json([

            'success' => 'true',
            'status'  => '200',
            'message' => 'Gallery Images',
            'product' => $gallery
        ]); 
    }
}
