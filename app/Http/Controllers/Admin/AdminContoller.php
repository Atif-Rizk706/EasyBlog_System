<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminContoller extends Controller
{
    public function Ad_dashboard(){
        return view("admin.index");
    }
    public function post_page(){
        return view('admin.post_page');
    }
    public function add_post(Request $request){
        $user=Auth()->user();
        $user_id=$user->id;
        $name=$user->name;
        $usertype=$user->user_type;
        $post= new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->post_status="active";
        $post->user_type=$usertype;
        $post->name=$name;
        $post->user_id=$user_id;
        if ($request->hasFile('photo')) {
            $photoname=time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move('postimage',$photoname);
            $post->image = $photoname; // Assuming you have a 'photo' column in your posts table
        }
       $post->save();
       return redirect()->back()->with('message',"post add successfully");
    }
    public function show_post(){
        $post=Post::all();
        return view('admin.show_post',compact("post"));
    }
    public function delete_post($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function edit_post($id){
        $post=Post::find($id);
        return view('admin.edit_page',compact("post"));
    }
    public function update_post(Request $request,$id){
        $post=Post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        if ($request->hasFile('photo')) {
            $photoname=time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move('postimage',$photoname);
            $post->image = $photoname; // Assuming you have a 'photo' column in your posts table
        }
        $post->save();
        return redirect()->back()->with('message',"post updated successfully");;
    }
}
