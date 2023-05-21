<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view("user.blog",[
            'data'=>$data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Comment::find("$id");
        $data->delete();

        return redirect('userx/comment');
    }

    public function comments()
    {
        $data = Comment::where("user_id" , "=", Auth::id())->get();
        return view("user.comment",[
            'data'=>$data,
        ]);
    }

    public function addblog(Request $request)
    {
        $data = new Blog();
        $data->user_id = 0;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->descr;
        $data->contents = $request->contents;
        $data->category_id = $request->category_id;
        $data->detail = $request->detail;
        $data->status = $request->statu;
        if($request -> file('image')){
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect("/userx");
    }
}
