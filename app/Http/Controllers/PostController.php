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
		$delete = DB::table('categories')->where('id', $id)->delete();
		if ($delete) {
        	 $notification=array(
                'messege'=>'Category Deleted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('category.all')->with($notification);   
        }
        else{
        	  $notification=array(
                'messege'=>'Something went wrong!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);   
        }
	}
	public function edit($id)
    {   
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
             'name' => 'required|max:25|min:4',
         ]);

    	$data=array();
    	$data['name']=$request->name;
        $category=DB::table('categories')->where('id',$id)->update($data);
        if ($category) {
        	 $notification=array(
                'messege'=>'Category Updated',
                'alert-type'=>'success'
                 );
               return Redirect()->route('category.all')->with($notification);   
        }
        else{
        	  $notification=array(
                'messege'=>'Nothing to updated',
                'alert-type'=>'error'
                 );
               return Redirect()->route('category.all')->with($notification);   
        }
    }
}
