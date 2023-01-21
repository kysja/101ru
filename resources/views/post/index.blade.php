@extends('layouts.layout')
@section('title', $viewData["title"])
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $viewData["title"] }}</h1>

        @if (count($viewData["posts"]) > 0)
            <div class="row gy-4">
                @foreach ($viewData["posts"] as $post)
                    <div class="col">
                        <div class="card" style="width: 24rem;">
                            <a href="{{ route('post.show', ['slug'=> $post->slug]) }}" class="text-decoration-none text-black">
                                <img src="{{ asset('storage/post/main/' . $post->id . '.jpg') }}" class="card-img-top" alt="{{ $post->title }}">
                                <div class="card-body">
                                    <p class="card-text text-center">{{ $post->title }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
          

    </div>
</div>
@endsection