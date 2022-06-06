<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/assets/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="{{ route('home') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="d-block mx-auto" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('home') }}" class="nav-link px-2 link-dark">Home</a></li>
            <li><a href="{{ route('posts.index') }}" class="nav-link px-2 link-dark">Posts</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @if( auth()->check() )
                <button type="button" class="btn btn-outline-primary me-2">{{ auth()->user()->name }}</button>
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('logout') }}'">Logout</button>
            @else
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('login') }}'">Login</button>
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('register') }}'">Sign In</button>
            @endif
        </div>
    </header>

    @yield('content')

    <footer class="py-3 my-4">
        <p class="text-center text-muted">© 2022 Company, Inc</p>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
