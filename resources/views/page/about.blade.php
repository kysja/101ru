@extends('layouts.layout')
@section('title', $viewData["page"]["title"])
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $viewData["page"]["title"] }}</h1>
        {!! $viewData["page"]["content"] !!}
    </div>
</div>
@endsection