<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData['title'] = 'Home';
        $viewData['h1'] = 'Home';
        $viewData['content'] = <<<HTML
        <p>We created this website for those who are interested in the modern Russia. We want to tell you a story of this country making links between significant events of its chronicles. We add a lot of pictures to each story, so you can see every single detail with your own eyes.</p>
        <p>Russia is a very interesting country with its unique history, incredible cultural heritage, breathtaking nature and stunning architecture. It is the only country in the world, which touches 12 seas, has the deepest lake with drinking water in it, the oldest and the largest fortress of the middle centuries (Kremlin).</p>
        HTML;

        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData['title'] = 'About';
        $viewData['h1'] = 'About';
        $viewData['content'] = <<<HTML
            <p style="text-align: right;"><em>&ldquo;In all the universe nothing remains permanent and unchanged but the spirit.&rdquo;&nbsp;</em></p>
            <p style="text-align: right;">Anton Chekhov, the Russian writer, The Seagull</p>
            <p>The enigmatic &ldquo;Russian soul&rdquo; is something that has been uniting this huge country for many centuries. The history of Russia includes absolutely different periods; the country has been populated with numerous nationalities; its lands have never been the same. Nevertheless there is one thing that never has changed: its unique soul. Russia went through success and losses. It shined and scrambled out of poverty. It was powerful and powerless; gave birth to genius and cruel dictators.</p>
            <p>Probably these are the reasons for an incessant interest to its past and present.</p>
            <p>We created this website for those who are interested in the modern Russia. We want to tell you a story of this country making links between significant events of its chronicles. We add a lot of pictures to each story, so you can see every single detail with your own eyes.</p>
            <p>This largest country in the world is 6,592,800 square miles. In the beginning of 2015 there were 146,267,288 residents in Russia. 74% of Russian population lives in the cities. In the end of the 19th century its population was 125,640,021, and only 13% people were living in towns.</p>
            <p>Now-a-days an official Russian capital, Moscow, and its cultural capital, Saint-Petersburg, are overflowed (there are 8,2% of Russian residents in Moscow and 3,5% in Saint-Petersburg). More than 180 nationalities are living in the country.</p>
            <p>Russia is a very interesting country with its unique history, incredible cultural heritage, breathtaking nature and stunning architecture. It is the only country in the world, which touches 12 seas, has the deepest lake with drinking water in it, the oldest and the largest fortress of the middle centuries (Kremlin).</p>
            <p>There are a lot of stereotypes about Russia and its people. For instance, it is a wide-spread opinion that the whole country is very cold, or that all Russians love vodka.</p>
            <p>Russians do not like to talk a lot about their job and always look for an opportunity to have fun and celebrate something. They are gloomy and do not like to smile, but despite this fact they love to spend long evenings sitting at the dinner table and discussing their life events.</p>
            <p>At the website we will tell you the real story of the modern Russia. Every post includes a lot of pictures, so you may see a lot of details by yourself.</p>
        HTML;



        return view('home.about')->with("viewData", $viewData);
    }


}