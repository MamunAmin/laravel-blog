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
               return Redirect()->back()->with($notification);   
        }else{
        	  $notification=array(
                'messege'=>'Something went wrong!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);   
        }
	}
}
