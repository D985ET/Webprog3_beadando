<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //listákat jelenítsük meg
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
        $topics = Topic::orderBy('title')->get();

        return view('post.create')->with(['topics' => $topics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:240',
            'topic_id' => 'required|exists:topics,id',
            'maxPlayer' => 'required|min:1|max:12',
            'description' => 'required',
            'content' => 'required',
            'cover' =>'file|image',
        ]);
        //dd($request->all());

        //todo replace this with authenticated user
        $user = User::first(); //első usert használom

        $post = $user->posts()->create($request->except('_token')); //USer.php-ban van egy ilyen method, mindent fogjunk meg a requestből ami nem a _token

        //KÉP:
        $image = $this->uploadImage($request);

        if ($image) 
        {
            $post->cover = $image->basename;
            $post->save();
        }


        return redirect()->route('post.details',$post)->with('success',__('Játék sikeresen hozzáadva')); //ezt a web.php-ban meg kell adni, ezután a show function
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    private function uploadImage(Request $request)
    {
        $file = $request->file('cover');

        $fileName = uniqid();

        $cover = Image::make($file)->save(public_path("upload/posts/{$fileName}.{$file->extension()}"));

        return $cover;
    }
}
