<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $viewData['title'] = 'Posts';
        $viewData['h1'] = 'Posts';
        $viewData['content'] = 'Posts List';

        return view('post.index')->with("viewData", $viewData);
    }

}
