@extends('layouts.layout')
@section('title', $viewData["title"])
@section('content')
<div class="row mb-5">
    <div class="col-md-12">
        <h1>{{ $viewData["title"] }}</h1>
        @include('partials.posts')
    </div>
</div>
@endsection