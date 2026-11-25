<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        DB::table('pages')->insert([
            ['title' => 'Home', 'content' => '<p>Welcome</p>', 'slug' => 'index'],
            ['title' => 'About us', 'content' => '<p>About text</p>', 'slug' => 'about'],
        ]);
        DB::table('posts')->insert([
            'id' => 1, 'title' => 'Moscow Metro', 'content' => '<p>Intro</p>', 'source' => '',
            'slug' => 'moscow-metro', 'sort' => 1, 'active' => true,
        ]);
        DB::table('post_items')->insert([
            'post_id' => 1, 'image' => '001.jpg', 'description' => 'First station', 'sort' => 1,
        ]);
        DB::table('sliders')->insert([
            'title' => 'Metro', 'image' => 'metro.jpg', 'link' => '/posts/moscow-metro', 'sort' => 1,
        ]);
    }

    public function test_home_page(): void
    {
        $this->get('/')->assertOk()->assertSee('Welcome', false)->assertSee('Moscow Metro');
    }

    public function test_about_page(): void
    {
        $this->get('/about')->assertOk()->assertSee('About us');
    }

    public function test_posts_index(): void
    {
        $this->get('/posts')->assertOk()->assertSee('Moscow Metro');
    }

    public function test_post_page(): void
    {
        $this->get('/posts/moscow-metro')->assertOk()->assertSee('First station');
    }

    public function test_unknown_post_is_404(): void
    {
        $this->get('/posts/nope')->assertNotFound();
    }
}
