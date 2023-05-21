<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\PrettyPrinter\Standard;

class BlogController extends Controller
{

    protected $appends = [
        'getParentsTree'
    ];

    public static function getParentsTree($category, $title)
    {
        if ($category == 0) {
            return $title;
        }
        $parent = Category::find($category);
        $title = $parent->title;

        return CategoryController::getParentsTree($parent, $title);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        return view("Admin.blog.index",[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view("Admin.blog.create",[
            'data'=>$data
        ]);
       // return view("Admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect("admin/blog");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $category,$id)
    {
        $data = Blog::find("$id");
        return view("Admin.blog.show",[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $category,$id)
    {
        $data = Blog::find("$id");
        $datacate = Category::all();
        return view("Admin.blog.edit",[
            'data'=>$data,
            'datacate'=>$datacate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $category,$id)
    {
        $data = Blog::find("$id");
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
        return redirect("admin/blog");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $category,$id)
    {
        $data = Blog::find("$id");
        //if($data->image && Storage::disk('public')->exists($data->image)){
        //    Storage::delete($data->image);
        //}
        $data->delete();

        return redirect('admin/blog');
    }
}
