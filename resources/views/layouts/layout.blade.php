<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }} ">
    
    <title>@yield('title', 'Russia in Pictures') | Russia in Pictures</title>
</head>
<body class="d-flex flex-column h-100">
    
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="{{ asset('/images/logo.png') }}" alt="Russia in Pictures">
        </a>

        <img src="{{ asset('/images/stand_with_ukraine.png') }}" class="me-5" alt="Stand with Ukraine" style="max-height:70px;">

        <ul class="nav nav-pills mt-3">
            <li class="nav-item"><a href="{{ route('page.index') }}" class="nav-link {{ Route::currentRouteName() == "page.index" ? "active" : "" }}" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="{{ route('page.about') }}" class="nav-link {{ Route::currentRouteName() == "page.about" ? "active" : "" }}">About</a></li>
            <li class="nav-item"><a href="{{ route('post.index') }}" class="nav-link {{ Route::currentRouteName() == "post.index" ? "active" : "" }}">Posts</a></li>
        </ul>
    </header>
</div>

<main class="flex-shrink-0">
    <div class="container">
        @yield('content')
    </div>
</main>


<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">&copy; 2015 &ndash; {{ date('Y') }} Russia in Pictures</span>
    </div>
</footer>


<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery-3.6.3.min.js"></script>
</body>
</html>
