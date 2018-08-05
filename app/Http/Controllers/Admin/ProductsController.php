<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();

        return view('admin.products.index')->with('products',$products)->with('heading','product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'           => 'required',
            'edition'         => 'required',
            'technical_data'  => 'required',
            'info'            => 'required',
            'use'             => 'required',
            'safety'          => 'required',
            'file'            => 'required|image',
        ]);

        $image = $request->file;

        $new_image = time().$image->getClientOriginalName();

        $image->move('uploads/product_images',$new_image);

        DB::table('products')->insert([

            'title'            => $request->title,
            'edition'          => $request->edition,
            'technical_data'   => $request->technical_data,
            'information'      => $request->info,
            'use'              => $request->use,
            'safety'           => $request->safety,
            'features'         => $request->feature,
            'image'            => 'uploads/product_images/'.$new_image,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ]);

        Session::flash('success','Product Added Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = DB::table('products')->where("id" , $id)->first();

        return view('admin.products.edit')->with('product',$products)->with('heading','product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $this->validate($request,[

                    'title'           => 'required',
                    'edition'         => 'required',
                    'technical_data'  => 'required',
                    'info'            => 'required',
                    'use'             => 'required',
                    'safety'          => 'required',
        ]);

        if ($request->hasFile('file')) 
        {
            $image = $request->file;

            $new_image = time().$image->getClientOriginalName();

            $image->move('uploads/product_images',$new_image);

            $product = 'uploads/product_images/'.$new_image;
        }

        DB::table('products')->where('id',$id)->update([

            'title'            => $request->title,
            'edition'          => $request->edition,
            'technical_data'   => $request->technical_data,
            'information'      => $request->info,
            'use'              => $request->use,
            'safety'           => $request->safety,
            'features'         => $request->feature,
            'image'            => empty($product) ? $request->hidden_file :'uploads/product_images/'.$new_image,
            'updated_at'       => date('Y-m-d H:i:s'),
        ]);

        Session::flash('success','Product Updated Successfully');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsfeed = DB::table('products')->where('id',$id)->delete();

        Session::flash('success','Product Deleted Successfully');

        return redirect()->back();
    }
}
