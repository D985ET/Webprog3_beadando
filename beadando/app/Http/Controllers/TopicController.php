<?php

namespace App\Http\Controllers;

use App\Models\Topic;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        $posts = $topic->posts()->orderBy('title','asc')->paginate(2);

        return view('topic.show')->with(compact('topic', 'posts'));
    }
}
