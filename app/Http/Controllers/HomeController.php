<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData['title'] = 'Home';
        $viewData['h1'] = 'Home';
        $viewData['content'] = 'Hello World!';

        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData['title'] = 'About';
        $viewData['h1'] = 'About';
        $viewData['content'] = 'Hello About!';

        return view('home.about')->with("viewData", $viewData);
    }


}