<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
//        $title = Setting::first()->site_name;
        $setting = Setting::first();

        $categories = Category::take(5)->get();
        // take(4) only takes the first 4 not the most used 4 ///

        $first_post = Post::orderBy('created_at', 'desc')->first();
        // this code will take the most latest post

        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        // this code will take the second most latest post

        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();

        $cat1 = Category::find(1);
        $cat2 = Category::find(2);
        $cat3 = Category::find(3);



        return view('index', compact('setting', 'categories', 'first_post', 'second_post', 'third_post', 'cat1', 'cat2', 'cat3'));

    }


    public function singlePost($slug){
        $post = Post::where('slug', $slug)->first();
//        $title = $post->title;
        $categories = Category::take(5)->get();
        $setting = Setting::first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $next = Post::find($next_id);
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $prev = Post::find($prev_id);

        $tags = Tag::all();

        return view('single', compact('post',  'categories', 'setting', 'next', 'prev', 'tags'));
    }


    public function category($id){
        $category = Category::find($id);

        $categories = Category::take(5)->get();
        $setting = Setting::first();

        return view('category', compact('category', 'categories', 'setting'));
    }


    public  function tag($id){
        $tag = Tag::find($id);

        $categories = Category::take(5)->get();
        $setting = Setting::first();

        return view('tag', compact('tag', 'categories', 'setting'));
    }



}
