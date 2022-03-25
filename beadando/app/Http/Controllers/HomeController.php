<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('title','asc')->paginate(2);//2 db jelenjen meg egyszerre, mi alapján title alapján növekvőben
        return view('home')->with(compact('posts'));
    }
}
