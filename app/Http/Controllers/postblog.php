<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class postblog extends Controller
{
    public function writepost()
    {
        $category = DB::table('categories')->get();
        return view('posts.writepost', compact('category'));
    }
    public function StorePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:25',
            'details' => 'required|max:500',
            'image' => 'required|mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='upload/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        
    }
    public function allpost()
    {
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->get();
        return view('posts.all_post',compact('post'));
        //response()->json($post);
    }
    public function viewpost($id)
    {
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
        return view('posts.view_post',compact('post'));
        //return response()->json($post); 
    }
    public function deletepost($id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->image;
        $delete = DB::table('posts')->where('id',$id)->delete();
        if($delete){
            unlink($image);
            $notification=array(
                'message'=>'Successfully Post Deleted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
        
    }
    public function editpost($id)
    {
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id',$id)->first();
        return view('posts.edit_post',compact('category','post'));
    }
    public function updatepost(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:25',
            'details' => 'required|max:500',
            'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='upload/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_image);
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $data['image']=$request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } 
    }
}
