<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        $data = DB::table('images')->where('product_id',$pid)->get();
        $blog = Blog::find("$pid");
        return view("Admin.image.index",[
            'data'=>$data,
            "blog"=>$blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pid)
    {
        $data = new Image();
        $data->product_id = $pid;
        $data->title = $request->title;
        if($request -> file('image')){
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect()->route('image.index',['pid'=>$pid]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$pid, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid,$id)
    {
        $data = Image::find("$id");
        if($data->image && Storage::disk('public')->exists($data->image)){
            Storage::delete($data->image);
        }
        $data->delete();

        return redirect()->route('image.index',['pid'=>$pid]);
    }
}
