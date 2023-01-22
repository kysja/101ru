<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $viewData = [
            'page' => Page::where('slug', 'index')->first(),
            'slider' => Slider::orderBy('sort')->get(),
            'posts' => Post::where('active', True)->orderBy('sort')->limit(6)->get(),
        ];
        
        return view('page.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [
            'page' => Page::where('slug', 'about')->first(),
        ];

        return view('page.about')->with("viewData", $viewData);
    }


}
