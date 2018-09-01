<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Redirect;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except ('index');
        $this->middleware('checkSingUpDate')->except ('index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
      //  Auth::user()->posts()->create($request->all());
        Auth::user()->posts()->create([
            'subject'=> $request['subject'],
            'post_massage'=> $request['post_massage']
            ]);

        return redirect('dashboard')->with('status', 'Submit Post !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)

    {
       // anther way to restore post

        // $post = Post::withTrashed()->find($post);
        return view('posts.edit',compact ('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $update = $post->update($request->all());
        if($update)
            return redirect('dashboard')->with('status', 'Will Update Post !');
        else
            return redirect('dashboard')->with('errors', 'Error on update  Post !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)

    {
       $delete = $post->delete ();

       if($delete)
           return redirect('dashboard')->with('status', 'Will Deleted  Post !');
       else
           return redirect('dashboard')->with('errors', 'Error on Deleted   Post !');

    }

    public function  restore($post)
    {
        $post = Post::withTrashed()->find($post)->restore();
        if($post)
            return redirect('dashboard')->with('status', 'Will Restored   Post !');
        else
            return redirect('dashboard')->with('errors', 'Error on  Restore  Post !');

    }
    public function  forceDelete($post)
    {
        $post = Post::withTrashed()->find($post)->forceDelete();

        if($post)

            return redirect('dashboard')->with('status', 'Will ForceDelete the Post !');
        else
            return redirect('dashboard')->with('errors', 'Error on  ForceDelete  Post !');


    }


}
