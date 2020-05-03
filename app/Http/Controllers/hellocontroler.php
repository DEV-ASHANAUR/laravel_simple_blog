<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class hellocontroler extends Controller
{
    public function index(){
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->paginate(3);
        return view('pages.index',compact('post'));

    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
}
