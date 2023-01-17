@extends('layouts.layout')
@section('title', $viewData["title"])
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $viewData["title"] }}</h1>
        <p>{{ $viewData["content"] }}</p>
    </div>
</div>
@endsection