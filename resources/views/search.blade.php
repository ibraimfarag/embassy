@extends('partials.master')

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/inner-pages.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/home.css')}}">
    <style>
        #search-results a {
            display: inline-block;
            width: auto;
            font-size: 18px;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        .search-item {
            border-bottom: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .readmore {
            display: inline !important;
            font-size: 14px !important;
        }
    </style>
@endsection

@section('content')

    <section id="body">
        <div class="container">
            <div class="col-md-9 col-sm-8">
                <div class="row" id="article-single">

                    <?php
                        $back = url('/'.($lang!='de' ? $lang : ''));

                        if($lang=='ar')
                            $backStr = 'للرجوع';
                        elseif($lang=='en')
                            $backStr = 'Back';
                        else
                            $backStr = 'Back';
                    ?>

                    <a href="{{ $back }}">< {{$backStr}}</a>
                    </br>
                    </br>
                @if($lang=='en')
                    <h2>Search results for "{{$keyword}}"</h2>
                @elseif($lang=='ar')
                    <h2>نتائج البحث عن "{{$keyword}}"</h2>
                @else
                    <h2>Search results for "{{$keyword}}"</h2>
                @endif
                    <br/>
                    <div id="search-results">
                    @if(count($data['sections']))
                        @foreach($data['sections'] as $item)
                            <div class="search-item">
                            @if($lang=='en')
                                <a href="{{$item->url}}">{{ $item->title_en }}</a>
                                <p>{{ \Illuminate\Support\Str::words(strip_tags($item->content_en),16) }}... <a class="readmore" href="{{$item->url}}">
                                        Read more
                                    </a></p>
                            @elseif($lang=='ar')
                                <a href="{{$item->url}}">{{ $item->title_ar }}</a>
                                    <p>{{ \Illuminate\Support\Str::words(strip_tags($item->content_ar),16) }}... <a class="readmore" href="{{$item->url}}">
                                        إقرأ المزيد
                                   </a></p>
                            @else
                                <a href="{{$item->url}}">{{ $item->title }}</a>
                                    <p>{{ \Illuminate\Support\Str::words(strip_tags($item->content),16) }}... <a class="readmore" href="{{$item->url}}">
                                        Lesen Sie weiter</a></p>
                            @endif
                            </div>
                        @endforeach
                    @else
                        <p>No results</p>
                    @endif
                    </div>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 sidebar">
                @include('partials.sidebar')
            </div>
        </div>
        </div>
    </section>

@endsection

@section('js')
@endsection
