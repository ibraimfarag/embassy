@extends('partials.master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $page = $contentService->getContentFront('home',$lang); ?>
<?php $homeSliders = $contentService->getPageImageSlides('home'); ?>
<?php $alerts = $contentService->getAnnouncements($lang); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/home.2.css') }}">
    <style>
        #ambassador-photo {
            background-image: url('{{ asset($page['ambassador-photo']['content']) }}');
        }
        #alerts .body {
            min-height: 300px;
        }
        .powered-by {
            display: none;
        }

        #curator-feed-instagram-layout, #curator-feed-default-feed-layout1 {
            height: 180px;
            min-height: 180px !important;
            overflow-y: scroll;
        }

        .crt-social-icon {
            display: none;
        }

    </style>
@endsection

@section('content')
    <section id="home-slider">
        <div class="container">
            <div class="owl-carousel" id="slider">
                @foreach($homeSliders as $slide)
                    <div><img src="{{ asset('public/'.$slide['photo']) }}"></div>
                @endforeach
            </div>
            <a href="#" class="slider-prev"></a>
            <a href="#" class="slider-next"></a>
        </div>
    </section>

    <section id="body">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div  id="ambassador" class="col-md-12">
                        <div class="row">
                            <div class="left">
                                <a href="{{ $page['ambassador-bio-link']['content'] }}" class="readmore"><div id="ambassador-photo"></div></a>
                            </div>
                            <?php

                                if($lang=='ar')
                                    $str = 'إقرأ المزيد';
                                elseif($lang=='de')
                                    $str = 'Lesen Sie weiter';
                                else
                                    $str = 'Read more';
                            ?>
                            <div class="right">
                                <div class="copy">
                                    {!! $page['ambassador-bio']['content'] !!}
                                    <a href="{{ $page['ambassador-bio-link']['content'] }}" class="readmore">{{$str}}</a> <img class="readmore" alt="readmore" src="{{ asset('public/img/read-more-arrow.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="alerts">
                        @foreach($alerts as $alert)
                            <div class="col-md-6 col">
                                <span class="icon"><img src="{{ asset($alert['icon']) }}"></span>
                                <div class="body">
                                    <h3>{!! $alert['title'] !!}</h3>
                                    <p>{!! $alert['content'] !!}</p>
                                    <a href="{{ $alert['link'] }}" target="_blank">

                                    @if($lang=='de')
                                        Mehr
                                    @elseif($lang=='ar')
                                        لمعرفة المزيد
                                    @else
                                        Learn more
                                    @endif
                                    </a>  <img class="readmore" alt="readmore" src="{{ asset('public/img/read-more-arrow.png') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 sidebar">
                    <div id="weather" class="clearfix">

                        <?php
                        if($lang=='ar')
                            $str = 'الطقس';
                        elseif($lang=='de')
                            $str = 'Wetter';
                        else
                            $str = 'WEATHER';
                        ?>

                        <h3>{{$str}}</h3>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="row">
                                <div id="berlinDay"></div> <div id="berlinTime"></div><br/>
                                <span><div id="berlinTemp"></div> <span class="celsius">&#8451;</span></span>	<br/>
                                @if($lang=='ar')
                                    برلين
                                @elseif($lang=='de')
                                    Berlin
                                @else
                                    Berlin
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="row">
                                <div id="dubaiDay"></div> <div id="dubaiTime"></div><br/>
                                <span><div id="dubaiTemp"></div> <span class="celsius">&#8451;</span></span>	<br/> 
                                @if($lang=='ar')
                                    أبوظبي
                                @elseif($lang=='de')
                                    Abu Dhabi
                                @else
                                    Abu Dhabi
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="social-embeds">
                        <div class="col-md-12">
                                {{----}}
                            <h3>TWITTER</h3>
                            <a class="twitter-timeline" height="250" href="https://twitter.com/UAEinBerlin?ref_src=twsrc%5Etfw"></a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                            <h3>FACEBOOK</h3>
                            <!-- Place <div> tag where you want the feed to appear -->
                            <div id="curator-feed-default-feed-layout1"></div>
                            <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
                            <script type="text/javascript">
                                /* curator-feed-default-feed-layout1 */
                                (function(){
                                    var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
                                    i.src = "https://cdn.curator.io/published/1984e450-dc32-485e-9a05-fd0db6a94d78.js";
                                    e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
                                })();
                            </script>
                            {{--<img src="{{ asset('public/img/facebook-full.png') }}" width="100%">--}}
                            {{--<br/>--}}
                            <br/>
                            <h3>INSTAGRAM</h3>
                            <!-- Place <div> tag where you want the feed to appear -->
                            <div id="curator-feed-instagram-layout"></div>
                            <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
                            <script type="text/javascript">
                            /* curator-feed-instagram-layout */
                            (function(){
                            var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
                            i.src = "https://cdn.curator.io/published/e70bffc3-f6c9-45ba-8db1-ae862f0b7d07.js";
                            e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
                            })();
                            </script>
                            <br/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('public/js/moment.js')}}"></script>
    <script>
        $.ajax({
            url: "{{ url('get-weather') }}",
            context: document.body
        }).success(function(results) {
            $('#berlinTemp').text(parseInt(results.berlin.consolidated_weather[0].the_temp));
            $('#berlinTime').text(results.berlin_time);
            $('#berlinDay').text(results.berlin_day);
            $('#dubaiTemp').text(parseInt(results.dubai.consolidated_weather[0].the_temp));
            $('#dubaiTime').text(results.dubai_time);
            $('#dubaiDay').text(results.dubai_day);
        });
    </script>
@endsection
