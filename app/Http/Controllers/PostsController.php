<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if (count($categories) == 0 || count($tags) == 0){
            Session::flash('info', 'You mast have a Category and Tag to create Post.');
            return redirect()->back();
        }
        return view('admin.posts.create', compact('categories', 'tags'));
        // without passing Category::all(), admin.posts.create will not have access to Category
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        // 5.4 has no request folder
        // dd($request->all());
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        // here we will be using public directory not the storage
        $featured->move('uploads/posts', $featured_new_name);
        // move() auto goes to public directory and save as $featured_new_name this name
        // here not usein the $post = new Post system sondern create()
//        $post = Post::create([
//            'title' => $request->title,
//            'content' => $request->content,
//            'featured' => 'uploads/posts/' . $featured_new_name,
//            'category_id' => $request->category_id,
////            'user_id'=> Auth::id(),
///              'slug' => str_slug($request->title)
//        ]);
//        Session::flash('success', 'Post created successfully');
//        dd($post);
//use upper code when post is not related to user
        ////////////////////////////////////////////////////////////////////////////////////////////////
        /// Upper code is eassier to understand
        /// plz practise full code later //////////////////////////////////////////////
        /// /////////////////////////////////////////////////////////////////////////////

        // i use edwin,s code to connect user with post
        $input = $request->all();
        $user = Auth::user();
        $input['featured'] = 'uploads/posts/' . $featured_new_name;
        $input['slug'] = str_slug($request->title);
        $user->posts()->create($input)->tags()->attach($request->tags);
        Session::flash('success', 'Post created successfully');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);
        if ($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/' . $featured_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success', 'Post updated successfully');
        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'The Post is trashed');
        return redirect()->back();
    }


    // SOFT DELETE

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed', compact('posts'));
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        // withTrashed() works like all() without softDelete
        // we cant use find() here
        $post->forceDelete();
        Session::flash('success', 'Post permanently deleted');
        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored successfully');
        return redirect()->route('posts');
    }




}



















