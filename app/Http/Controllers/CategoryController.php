<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

class CategoryController extends Controller
{
    public function index()
	{
		return view('category.create');
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
             'name' => 'required|unique:categories|max:25|min:4',
         ]);

    	$data=array();
    	$data['name']=$request->name;
        $category=DB::table('categories')->insert($data);

        if ($category) {
        	 $notification=array(
                'messege'=>'Successfully Category Added',
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

	public function all()
	{
		$category = DB::table('categories')->get();
		return view('category.all', compact('category'));
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
