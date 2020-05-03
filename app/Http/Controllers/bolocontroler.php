<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class bolocontroler extends Controller
{
    public function addcategory()
    {
        return view('posts.add_category');
    }
    public function Storecategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        $data=array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category=DB::table('categories')->insert($data);
        //return response()->json($data);
        if($category){
            $notification=array(
                'message'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function allcategory()
    {
        $category = DB::table('categories')->get();
        //return response()->json($category);
        return view('posts.all_category', compact('category'));
    }
    public function viewcategory($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        //return response()->json($category);
        return view('posts.categoryview')->with('cat',$category);
    }
    public function deletecategory($id)
    {
        $delete = DB::table('categories')->where('id',$id)->delete();
        $notification=array(
            'message'=>'Successfully Category Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editcategory($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('posts.editcategory')->with('edit',$category);
    }
    public function updatecategory(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);

        $data=array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data);
        //return response()->json($data);
        if($category){
            $notification=array(
                'message'=>'Successfully Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something To Update!',
                'alert-type'=>'error'
            );
            return Redirect()->route('all.category')->with($notification);
        }
    }
}
