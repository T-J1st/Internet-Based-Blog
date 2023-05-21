<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("Admin.index");
    }
    public function users(){
        return view("Admin.users");
    }
    public function setting(){
        $data = Setting::first();
        if($data === null){
            $data = new Setting();
            $data->title = 'Project Title';
            $data->save();
            $data = Setting::first();
        }
        return view("Admin.setting",[
            'data'=>$data,
        ]);
    }
    public function settingUpdate(Request $request){
        $data = Setting::find(1);

        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('descr');
        $data->company = $request->input('company');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->smtpserver = $request->input('smtpserver');
        $data->smtpemail = $request->input('smtpemail');
        $data->smtppassword = $request->input('smtppassword');
        $data->smtpport = $request->input('smtpport');
        $data->facebook = $request->input('facebook');
        $data->instagram = $request->input('instagram');
        $data->twitter = $request->input('twitter');
        $data->youtube = $request->input('youtube');
        $data->aboutus =  $request->input('aboutus');
        $data->contact = $request->input('contact');
        $data->references = $request->input('references');
        $data->status = $request->input('statu');
        if($request -> file('image')){
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect()->route('setting');
    }
}
