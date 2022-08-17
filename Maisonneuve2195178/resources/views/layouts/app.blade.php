<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- <title>@yield('title')</title> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <!-- icons open source -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
    @php $locale = session()->get('locale'); @endphp
    <ul class="nav bg-black justify-content-end">

        <li class="nav-item px-4 @if($locale!='en') d-none @endif">

            <a class="nav-link text-info " style="--bs-bg-opacity: .1;" aria-current="page" href="{{ route('lang', 'fr')}}"><i class="fa-solid fa-globe px-1"></i><strong>Français</strong></a>
        </li>

        <li class="nav-item px-4 @if($locale=='en') d-none @endif">

            <a class="nav-link text-info" style="--bs-bg-opacity: .1;" href="{{ route('lang', 'en')}}"><i class="fa-solid fa-globe px-1"></i><strong>English</strong></a>
        </li>

    </ul>
    <nav class="navbar navbar-expand-lg bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand align-middle" href="#">
                <img src="{{asset('img/logo.png')}}" style="height: 50px; " alt="" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav px-4 border-2">
                    @guest
                    <li class="nav-item d-none">
                        <a class="nav-link" href="{{route('registration')}}">@lang("lang.text_registration")</a>
                    </li>
                    @else
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="{{route('blog')}}"><strong>Blog</strong></a>
                    </li>
                    <div class="nav-item ps-4">
                        <a class="nav-link" href="{{route('upload.index')}}"><strong>Documents</strong></a>
                    </div>
                    <div class="nav-item ps-4">
                        <a class="nav-link" href="{{ route('etudiants') }}"><strong>profil</strong></a>
                    </div>
                    @endguest
                </ul>

            </div>
            <div class="navbar-nav px-4 border-end border-2">
                <button class="border border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                    @php
                    $user = Auth::user()->name ?? '';
                    @endphp
                    @if($user)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    {{ ucfirst($user) }}
                    @endif
                    <!-- @if(session('success'))
                        {{ session('success')}}
                        @endif -->
                </button>

                <!-- <ul class="dropdown-menu dropdown-menu-end">
                        @guest
                        <li><a class="dropdown-item" href="{{route('login')}}">@lang("lang.text_login")</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('logout')}}">@lang("lang.text_logout")</a></li>
                        @endguest
                        
                    </ul> -->
            </div>

            <ul class="navbar-nav px-4">
                @guest
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">@lang("lang.text_login")</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">@lang("lang.text_logout")</a>
                    @endguest
            </ul>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->

</body>

</html>