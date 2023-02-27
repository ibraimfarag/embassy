<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>UAE Embassy Berlin - Official Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    @if($lang=='ar')
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
        <!-- compiled and minified CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-cSfiDrYfMj9eYCidq//oGXEkMc0vuTxHXizrMOFAaPsLt1zoCUVnSsURN+nef1lj"
            crossorigin="anonymous">
        <!-- compiled and minified theme CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
            integrity="sha384-YNPmfeOM29goUYCxqyaDVPToebWWQrHk0e3QYEs7Ovg6r5hSRKr73uQ69DkzT1LH"
            crossorigin="anonymous">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap-theme.min.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('public/css/main.2.css') }}">

    @if($lang=='ar')
        <link rel="stylesheet" href="{{ asset('public/css/main-ar.2.css') }}">
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('public/vendor/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owlcarousel/owl.theme.default.min.css') }}">

    @yield('css')

    <link rel="stylesheet" href="{{ asset('public/css/articles.2.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/font-awesome.min.css') }}">

    <script src="{{ asset('public/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


@inject('contentService', 'App\Services\ContentProvider')
<?php $menu = $contentService->getMenu($lang); ?>

<header id="header">
    <div class="container-fluid" id="top">
        <div class="container">
            <div class="col-md-12 text-center">
                <?php
                    if($lang=="en")
                        $home_url = url('/en');
                    elseif($lang=="ar")
                        $home_url = url('/ar');
                    else
                        $home_url = url('/');
                ?>
                <a href="{{$home_url}}"><img src="{{ asset('public/img/uae-embassy-logo.png') }}"></a>
                <ul id="lang">
                    <li><a id="deLang" href="{{ url('/') }}" class="{{ $lang=="de" ? 'active' : '' }}">DE</a></li>
                    <li><a id="enLang" href="{{ url('/en') }}" class="{{ $lang=="en" ? 'active' : '' }}">EN</a></li>
                    <li><a id="arLang" href="{{ url('/ar') }}" class="{{ $lang=="ar" ? 'active' : '' }}">AR</a></li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="container" id="menu">
        <div class="col-md-10">
            <ul id="main-nav">
                @foreach($menu as $item)
                    <?php
                        if($item['slug'] == 'home')
                            $item['slug'] == '';
                    ?>
                    <li><a href="{{ url($lang!='de' ? $lang.'/'.$item['slug'] : $item['slug']) }}" class="{{Str::contains(URL::current(), $item['slug']) ? 'active' : ''}}">{{ $item['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-2 text-right">
            <div id="menu-icon" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <?php
                if($lang=='en')
                    $searchUrl = 'en/search';
                elseif($lang=='ar')
                    $searchUrl = 'ar/search';
                else
                    $searchUrl = 'search';
            ?>
            <form action="{{url($searchUrl)}}" method="post">
                @csrf
                <?php
                if($lang=='ar')
                    $str = 'بحث...';
                elseif($lang=='en')
                    $str = 'Search...';
                else
                    $str = 'Suche...';
                ?>
                <input type="text" id="search" placeholder="{{$str}}" name="keyword">
                <input type="hidden" name="lang" value="{{$lang}}">
                <input type="submit" value="submit" id="searchbt">
            </form>
        </div>
    </nav>
</header>
