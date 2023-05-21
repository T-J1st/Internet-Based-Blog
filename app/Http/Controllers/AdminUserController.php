<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view("Admin.user.index",[
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
        $data = new Role();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find("$id");
        $role = Role::all();
        return view("Admin.user.show",[
            'data'=>$data,
            'role'=>$role,
        ]);
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
        $data = Message::find("$id");
        $data->note = $request->note;
        $data->status = "Read and Noted";
        $data->save();
        return redirect("admin/message/show/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addrole(Request $request,$id)
    {
        $data = new RoleUser();
        $data->user_id = $id;
        $data->role_id = $request->role_id;
        $data->save();
        return redirect("admin/user/show/".$id);
    }

    public function destroyrole($uid,$rid){
        $user = User::find("$uid");
        $user->roles()->detach($rid);

        return redirect('admin/user/show/'.$uid);
    }

}
