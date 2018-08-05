<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class NewfeedContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsfeed = DB::table('news_feed')->get();

        return view('admin.news_feed.index')->with('newsfeeds',$newsfeed)->with('heading','newsfeed');
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

            'name'     => 'required',
            'content'  => 'required',
            'file'     => 'required|image',
        ]);

        $image = $request->file;

        $new_image = time().$image->getClientOriginalName();

        $image->move('uploads/news_feed_images',$new_image);

        DB::table('news_feed')->insert([

            'name'           => $request->name,
            'content'        => $request->content,
            'image'          => 'uploads/news_feed_images/'.$new_image,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);

        Session::flash('success','News Feed Added Successfully');

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
        $newsfeed = DB::table('news_feed')->where('id',$id)->first();

        return view('admin.news_feed.edit')->with('newsfeeds',$newsfeed)->with('heading','newsfeed');
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

            'name'     => 'required',
            'content'  => 'required',
        ]);

        if ($request->hasFile('file')) 
        {
            $image = $request->file;

            $new_image = time().$image->getClientOriginalName();

            $image->move('uploads/news_feed_images',$new_image);

            $newsfeed = 'uploads/news_feed_images/'.$new_image;
        }

        DB::table('news_feed')->where('id',$id)->update([

            'name'           => $request->name,
            'content'        => $request->content,
            'image'          => empty($newsfeed) ? $request->hidden_file :'uploads/news_feed_images/'.$new_image,
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);

        Session::flash('success','News Feed Updated Successfully');

        return redirect()->route('newsfeed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsfeed = DB::table('news_feed')->where('id',$id)->delete();

        Session::flash('success','News Feed Deleted');

        return redirect()->back();
    }
}
