@extends('layouts.layout')
@section('title', 'Main Page')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Story of the Modern Russia in Pictures</h1>
        {!! $viewData["page"]["content"] !!}
    </div>
</div>


@if (count($viewData["slider"]) > 0)
<div id="carouselExampleCaptions" class="carousel slide mb-5">
    <div class="carousel-inner">
        @foreach ($viewData["slider"] as $slider)
            <a href="{{ $slider->link }}">
                
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
                    <div class="d-none d-md-block text-center my-3 text-black">
                        <h5>{{ $slider->title }}</h5>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endif

@include('partials.posts')
<div class="mt-3 mb-5 text-center"><a href="{{ route('post.index') }}" class="btn btn-primary">More posts...</a></div>


@endsection



