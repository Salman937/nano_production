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
            'file'    => 'required',
        ]);

        $images = array();

        if($files = $request->file('file'))
        {
            foreach($files as $file)
            {
                $name = time().$file->getClientOriginalName();

                $file->move('uploads/gallery_images',$name);

                $images[] = 'uploads/gallery_images/'.$name;
            }
        }
        

        DB::table('gallery')->insert([

            'title'          => $request->title,
            'image'          => implode("|",$images),
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

        // dd($gallery);

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

        $images = array();

        if($files = $request->file('newfile'))
        {
            foreach($files as $file)
            {
                $name = time().$file->getClientOriginalName();

                $file->move('uploads/gallery_images',$name);

                $images[] = 'uploads/gallery_images/'.$name;
            }
        }

        if($old_imgs = $request->file('img'))
        {
            foreach($old_imgs as $old_img)
            {
                $img_name = time().$old_img->getClientOriginalName();

                $old_img->move('uploads/gallery_images',$img_name);

                $images[] = 'uploads/gallery_images/'.$img_name;
            }
        }

        if($hidden_img = $request->hidden_img)
        {
            foreach($hidden_img as $old)
            {
                $images[] = $old;
            }
        }
        
        DB::table('gallery')->where('id',$id)->update([

            'title'          => $request->title,
            'image'          => implode("|",$images),
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
