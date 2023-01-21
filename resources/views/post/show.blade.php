@extends('layouts.layout')
@section('title', $viewData["title"])
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $viewData["title"] }}</h1>
        <div class="mb-4">{!! $viewData["post"]["content"] !!}</div>

        @foreach ($viewData["items"] as $item)
            <div class="mb-4">
                <div class="mb-1">{{ $item->sort }}. {{ $item->description }}</div>
                <div><img src="{{ asset('storage/post/images/' . $viewData["post"]["id"] . "/" . $item->image) }}" alt="{{ \Illuminate\Support\Str::limit($item->description, 100) }}" class="img-fluid"></div>
            </div>
        @endforeach
        <div class="m-4">{!! $viewData["post"]["source"] !!}</div>
    </div>
</div>
@endsection