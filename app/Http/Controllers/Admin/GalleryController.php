<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = DB::table('gallery')->get();

        return view('admin.gallery.index')->with('gallaries', $gallery)->with('heading','gallery');
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

            'title'   => 'required',
            'file'    => 'required|image',
        ]);

        $image = $request->file;

        $new_image = time().$image->getClientOriginalName();

        $image->move('uploads/gallery_images',$new_image);

        DB::table('gallery')->insert([

            'title'          => $request->title,
            'image'          => 'uploads/gallery_images/'.$new_image,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);

        Session::flash('success','Image Added Successfully to Gallery');

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
        $gallery = DB::table('gallery')->where('id',$id)->first();

        return view('admin.gallery.edit')->with('gallary', $gallery)->with('heading','gallery');
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

            'title'   => 'required',
        ]);

        if ($request->hasFile('file')) 
        {
            $image = $request->file;

            $new_image = time().$image->getClientOriginalName();

            $image->move('uploads/gallery_images',$new_image);

            $gallery = 'uploads/user_images/'.$new_image;
        }

            DB::table('gallery')->where('id',$id)->update([

                'title'          => $request->title,
                'image'          => empty($gallery) ?  : 'uploads/gallery_images/'.$new_image,
                'updated_at'     => date('Y-m-d H:i:s'),
            ]);


        Session::flash('success','Image Updated Successfully to Gallery');

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('gallery')->where('id',$id)->delete();

        Session::flash('success','Deleted');

        return redirect()->back();
    }
}
