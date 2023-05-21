<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $sliderdata = Blog::limit(3)->get();
        $bloglist = Blog::limit(6)->orderBy('id', 'desc')->get();
        $category = Category::all();
        return view("index", [
            'sliderdata' => $sliderdata,
            'bloglist' => $bloglist,
            'category' => $category,
            'setting' => $setting,
        ]);
    }

    public function about()
    {
        $setting = Setting::first();
        return view("about", [
            'setting' => $setting,
        ]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view("contact", [
            'setting' => $setting,
        ]);
    }

    public function blog()
    {
        $setting = Setting::first();
        $category = Category::where('parent_id', '=', 0)->get();
        $blog = Blog::all();
        return view("work", [
            'category' => $category,
            'blog' => $blog,
            'setting' => $setting,
        ]);
    }

    public function blogsingle($id)
    {
        $comment = Comment::where('blog_id', '=', $id)->where('status', "True")->get();
        $setting = Setting::first();
        $data = Blog::find("$id");
        $comment_number = count(Comment::where('blog_id', '=', $id)->where('status', "True")->get());
        return view("work-single", [
            'data' => $data,
            'setting' => $setting,
            'comment' => $comment,
            'num_com' => $comment_number,
        ]);
    }

    public function blogcategory($id)
    {
        $setting = Setting::first();
        $category = Category::where('parent_id', '=', 0)->get();
        $blog = Blog::where('category_id', '=', $id)->get();
        return view("work", [
            'category' => $category,
            'blog' => $blog,
            'setting' => $setting,
        ]);
    }

    public function contactstore(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->status = "New";
        $data->save();

        return redirect('contact')->with('info', "Your message has been send");

    }

    public function comment(Request $request)
    {
        //dd($request);
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->blog_id = $request->input('blog_id');
        $data->comment = $request->input('review');
        $data->subject = $request->input('subject');
        $data->rate = $request->input('rate');
        $data->ip = request()->ip();
        $data->save();

        return redirect('/blogsingle/' . $request->input('blog_id'))->with('info', "Your comment has been send");

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    public function loginadmincheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');

        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
