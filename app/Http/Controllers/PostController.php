<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
	public function index()
	{
		$category = DB::table('categories')->get();
		return view('post.create', compact('category'));
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => 'required | mimes:jpeg,jpg,png,PNG | max:2000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    	if ($image) {
    		$image_name=rand(1,500000);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='blog/img/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Post Inserted',
                'alert-type'=>'success'
                 );
             return Redirect()->route('post.all')->with($notification);
    	}
	}

	public function all()
	{
		$post=DB::table('posts')
    	      ->join('categories','posts.category_id','categories.id')
    	      ->select('posts.*','categories.name')
    	      ->get();
		return view('post.all', compact('post'));
	}

	public function view($id)
    {
    	$post=DB::table('posts')
    	      ->join('categories','posts.category_id','categories.id')
    	      ->select('posts.*','categories.name')
    	      ->where('posts.id',$id)
    	      ->first();
    	 return view('post.view',compact('post'));    
    }

	public function delete($id)
	{
		$post=DB::table('posts')->where('id',$id)->first();
    	$image=$post->image;
    	$delete=DB::table('posts')->where('id',$id)->delete();
    	if ($delete) {
    		unlink($image);
    		$notification=array(
                'messege'=>'Successfully Post Deleted !',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
    	}
	}
	public function edit($id)
    {   
    	$category=DB::table('categories')->get();
    	$post=DB::table('posts')->where('id',$id)->first();
    	return view('post.edit',compact('category','post'));
    }

    public function update(Request $request,$id)
    {
    	 $validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => ' mimes:jpeg,jpg,png,PNG | max:2000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
	    $image=$request->file('image');
    	if ($image) {
    		$image_name=rand(1,500000);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
             $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
                 );
             return Redirect()->route('post.all')->with($notification);
    	}else{
    		 $data['image']=$request->old_photo;
    		 DB::table('posts')->where('id',$id)->update($data);
    		 $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
                 );
             return Redirect()->route('post.all')->with($notification);
    	}
    }
}
