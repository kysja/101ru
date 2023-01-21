<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostItem;
// use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $viewData['title'] = 'Posts';
        $viewData['h1'] = 'Posts';
        $viewData['posts'] = Post::where('is_published', True)->orderBy('sort')->get();

        return view('post.index')->with("viewData", $viewData);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $viewData = [
            'title' => $post->title,
            'h1' => $post->title,
            'post' => $post,
            'items' => PostItem::where('post_id', $post->id)->orderBy('sort')->get(),
        ];

        return view('post.show')->with("viewData", $viewData);
    }

}
