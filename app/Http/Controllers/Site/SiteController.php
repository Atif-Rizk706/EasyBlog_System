<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;

class SiteController extends Controller
{
    public function index_site (){
        if(Auth::id()){
         $usertype=Auth()->user()->user_type;
         if($usertype=='user')
         {
             $post=Post::all();
             return view('frontend.home',compact('post'));
         }
         else if ($usertype=='admin')
         {
             return view("admin.index");
         }
        }

    }
    public function home(){
        $post=Post::all();
        return view('frontend.home',compact('post'));
    }
    public function single_post($id){
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        $category = $post->category;

        // Retrieve all posts with the same category, excluding the current post
        $relatedPosts = Post::where('category', $category) // Category column
        ->where('id', '!=', $post->id) // Exclude the current post
        ->get();

        $comments = $post->comments; // Retrieve comments related to the post
        return view('frontend.single_post', compact('post', 'comments', 'relatedPosts'));
    }
    public function add_comment(Request $request,$id){
        $comment=new Comment();
        $user=Auth()->user();
        $comment->user_id=$user->id;
        $comment->user_name=$request->name;
        $comment->description=$request->message;
        $comment->email=$request->email;
        $comment->post_id=$id;
        $comment->save();
        return redirect()->back();
    }
    public function creat_post(){
        return view ('frontend.creat_post');
    }
    public function save_post(Request $request){
        $user=Auth()->user();
        $user_id=$user->id;
        $name=$user->name;
        $usertype=$user->user_type;
        $post= new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->post_status="pending";
        $post->user_type=$usertype;
        $post->name=$name;
        $post->category=$request->category;

        $post->user_id=$user_id;

        if ($request->hasFile('photo')) {
            $photoname=time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move('postimage',$photoname);
            $post->image = $photoname; // Assuming you have a 'photo' column in your posts table
        }
        $post->save();
        Alert::success('Congrats','your post added successfully');
        return redirect()->back();
    }
    public function my_post(){
        $user=Auth()->user();
        $user_id=$user->id;
        $posts = Post::where('user_id',$user_id)->get();
        return view ('frontend.my_post',compact('posts'));
    }
    public function del_my_post($id){
        $post=Post::find($id);
        $post->delete();
        Alert::success('your post deleted successfully');
        return redirect()->back();
    }
    public function edit_my_post($id){
        $post=Post::find($id);
        return view ('frontend.edit_post',compact('post'));
    }
    public function contact_page(){
        return view('frontend.contact_form');
    }
    public function update_post(Request $request ,$id){
        $post=Post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->category=$request->category;
        if ($request->hasFile('photo')) {
            $photoname=time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move('postimage',$photoname);
            $post->image = $photoname; // Assuming you have a 'photo' column in your posts table
        }
        $post->save();
        return redirect()->back()->with('message',"post updated successfully");
    }
    public function search_post(Request $request){
        $search_term=$request->input('query');
        $post = Post::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search_term) . '%'])
            ->orWhereRaw('LOWER(category) LIKE ?', ['%' . strtolower($search_term) . '%'])
            ->get();
        if ($post->isEmpty()) {
            $message = 'No results found for "' . $search_term . '".';
        }

        return view('frontend.home', compact('post') + (isset($message) ? ['message' => $message] : []));

    }
}
