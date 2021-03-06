<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{

   /*public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }*/

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
     * @param  \App\Http\Requests\PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        //dd($request->all());

       /* //todo replace this with authenticated user
        $user = User::first(); //első usert használom

        $post = $user->posts()->create($request->except('_token')); //USer.php-ban van egy ilyen method, mindent fogjunk meg a requestből ami nem a _token*/
        $post = Auth::user()->posts()->create($request->except('_token'));
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

        $topics = Topic::orderBy('title')->get();

        return view('post.edit')->with(compact('post', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
       

        $post->update($request->except('_token'));

        $image = $this->uploadImage($request);

        if ($image) 
        {
            if ($post->cover) 
            {
                $image->delete();
            }

            $post->cover = $image->basename;
            $post->save();
        }

        return redirect()->route('post.edit', $post)->with('success', __('Post updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    { 
        $image = $post->cover;
        $image_path = public_path('upload\\posts\\').$image;
       
        if (isset($image) && file_exists($image_path)) 
        {
            unlink($image_path);
        }
        $post = Post::where('id',$post->id)->first();
        if ($post != null)
        {
            $post->delete();
            return redirect()->route('home')->with(['success'=> 'Successfully deleted']);
        }
        else
        {
            return redirect()->route('home')->with(['fail'=>'Delete failed!']);
        }

    }
    public function comment(Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'required|min:10', //legalább 10 karakter
        ]);

        $comment = new Comment;
        $comment->message = $request->comment;
        $comment->user()->associate($request->user()); //ugyanaz mint az Auth::user()

        $post->comments()->save($comment);

  

        return redirect()->route('post.details', $post)->with('success', __('Comment saved successfully'));
    }

    private function uploadImage(Request $request)
    {
        $file = $request->file('cover');

        if (!$file) { //hogyha nincs kép akkor csak simán hagyja ki
            return;
        }
        $fileName = uniqid();

        $cover = Image::make($file)->save(public_path("upload/posts/{$fileName}.{$file->extension()}"));

        return $cover;
    }
    protected function resourceAbilityMap()
    {
        $abilityMap = parent::resourceAbilityMap();

        $abilityMap['comment'] = 'create';
     

        return $abilityMap;
    }
}
