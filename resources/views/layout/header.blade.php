<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Authentication || webprog.io</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Auth App</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{route('home')}}"
                    >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                </li>
            </ul>
            <div class="d-flex">
{{--                 @if(auth()->check())--}}

{{--                    <a href="{{ route('logout') }}" class="btn btn-sm btn-secondary ms-2">Logout</a>--}}
{{--                @else--}}
{{--                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark">Login</a>--}}
{{--                    <a href="{{ route('register') }}" class="btn btn-sm btn-secondary ms-2">Register</a>--}}
{{--                @endif--}}

                     @auth
                         <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                         <a href="{{ route('logout') }}" class="btn btn-sm btn-secondary ms-2">Logout</a>
                     @endauth

                     @guest
                         <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark">Login</a>
                         <a href="{{ route('register') }}" class="btn btn-sm btn-secondary ms-2">Register</a>
                     @endguest

            </div>
        </div>
    </div>
</nav>
