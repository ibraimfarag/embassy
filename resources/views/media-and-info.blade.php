@extends('partials.master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $page = $contentService->getContentFront('media-and-info',$lang); ?>
<?php $pressReleases = $contentService->getArticles('press-release',$lang); ?>
<?php $bulletins = $contentService->getBulletins($lang); ?>
<?php $newsletters = $contentService->getNewsletters($lang); ?>
<?php $galleries = $contentService->getGalleries($lang); ?>

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/inner-pages.2.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/lightbox/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/gallery.2.css')}}">
    <link rel="stylesheet" href="{{ asset('public/vendor/macy.css') }}">
@endsection

@section('content')

		<section id="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 clearfix" id="inner-sidebar">
						<ul>
                            <?php $first = true; ?>
                            @foreach($page as $ky=>$section)
                                <li class="main-li {{ isset($section['children']) ? '' : 'no-child' }} {{ $first ? 'active' : '' }}">
                                    <a href="#" class="main-nav {{ $first ? 'active' : '' }}" {{ !isset($section['children']) ? 'data-id='.$ky : '' }}>{{ $section['title'] }}</a>

                                    @if(isset($section['children']))
                                        <ul>
                                            @foreach($section['children'] as $key=>$child)
                                                <li><a href="#" class="sub-nav" data-id="{{ $child['id'] == 10 ? 'visa-'.$key : $key }}">{{$child['title']}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                <?php $first = false; ?>
                            @endforeach
						</ul>
					</div>
					<div class="col-md-9 col-sm-9" id="section-content">
                        <?php $first = true; ?>
                        @foreach($page as $ky=>$section)

                            <div class="section {{ $first ? 'active' : '' }}" data-id="{{$ky}}">
                                {!! $section['content'] !!}

                                @if($section['id']==20)
                                    <div id="macy-container" style="{{ $lang=='ar' ? 'direction: rtl' : '' }}">

                                        <?php $first = true; ?>

                                        <?php

                                        if($lang=='ar')
                                            $str = 'إقرأ المزيد';
                                        elseif($lang=='en')
                                            $str = 'Read more';
                                        else
                                            $str = 'Lesen Sie weiter';
                                        ?>
                                        @foreach($pressReleases as $ky=>$item)

                                            <div class="colm active" {{ $first ? 'macy-complete="1"' : '' }} >
                                                <div class="article">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"><span class="article-icon"></span> <span class="date">Article | {{ $item['publish_date'] }}</span></div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="{{ url('/').($lang!='de' ? '/'.$lang : '').'/p/'.$item['slug'] }}"><h3>{{ $item['title'] }}</h3></a>
                                                            <p>{{ $item['intro'] }}</p>
                                                            <p><a href="{{ url('/').($lang!='de' ? '/'.$lang : '').'/p/'.$item['slug'] }}" class="readmore">{{$str}}</a><img class="readmore" alt="readmore" src="{{ asset('public/img/read-more-arrow.png') }}"></p>
                                                            <img src="{{ asset('public/'.$item['thumbnail']) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $first = false; ?>
                                        @endforeach
                                    </div>

                                @elseif($section['id']==21)

                                    <?php
                                    if($lang=='ar')
                                        $str = 'Download';
                                    elseif($lang=='en')
                                        $str = 'Download';
                                    else
                                        $str = 'Herunterladen';

                                    if($lang=='ar')
                                        $str2 = 'Share';
                                    elseif($lang=='en')
                                        $str2 = 'Share';
                                    else
                                        $str2 = 'Teilen';
                                    ?>
                                    <table>
                                        @foreach($bulletins as $ky=>$item)
                                            <tr>
                                                @if($lang!='ar')
                                                <td><strong>{{ $item['title'] }}</strong><br/>{{ $item['edition'] }} – {{ $item['date'] }}</td>
                                                <td class="text-center">
                                                    <a href="{{ $item['file'] }}" class="icon-link download" download target="_blank">{{$str}}</a>
                                                    <a href="#" class="icon-link share" data-title="{{ $item['title'] }} {{ $item['edition'] }} – {{ $item['date'] }}">{{$str2}}</a>
                                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="display:none;">
                                                        <a href="" target="_blank">
                                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(24, 119, 242);">
                                                            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                                <path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span>
                                                        </a>
                                                        <a href="" target="_blank">
                                                            <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(85, 172, 238);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span>
                                                        </a>
                                                        <a href="" target="_blank">
                                                            <span class="a2a_svg a2a_s__default a2a_s_email" style="background-color: rgb(1, 102, 255);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M26 21.25v-9s-9.1 6.35-9.984 6.68C15.144 18.616 6 12.25 6 12.25v9c0 1.25.266 1.5 1.5 1.5h17c1.266 0 1.5-.22 1.5-1.5zm-.015-10.765c0-.91-.265-1.235-1.485-1.235h-17c-1.255 0-1.5.39-1.5 1.3l.015.14s9.035 6.22 10 6.56c1.02-.395 9.985-6.7 9.985-6.7l-.015-.065z"></path></svg></span>
                                                        </a>
                                                        <a href="" target="_blank">
                                                            <span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                @else
                                                    <td class="text-center"><a href="#" class="icon-link share" data-title="{{ $item['title'] }} {{ $item['edition'] }} – {{ $item['date'] }}">{{$str2}}</a> <a href="{{ $item['file'] }}" class="icon-link download" download target="_blank">{{$str}}</a>
                                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="display:none;">
                                                            <a href="" target="_blank">
                                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(24, 119, 242);">
                                                            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                                <path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(85, 172, 238);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_email" style="background-color: rgb(1, 102, 255);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M26 21.25v-9s-9.1 6.35-9.984 6.68C15.144 18.616 6 12.25 6 12.25v9c0 1.25.266 1.5 1.5 1.5h17c1.266 0 1.5-.22 1.5-1.5zm-.015-10.765c0-.91-.265-1.235-1.485-1.235h-17c-1.255 0-1.5.39-1.5 1.3l.015.14s9.035 6.22 10 6.56c1.02-.395 9.985-6.7 9.985-6.7l-.015-.065z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><strong>{{ $item['title'] }}</strong><br/>{{ $item['edition'] }} – {{ $item['date'] }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </table>

                                @elseif($section['id']==30)

                                    <?php
                                    if($lang=='ar')
                                        $str = 'Download';
                                    elseif($lang=='en')
                                        $str = 'Download';
                                    else
                                        $str = 'Herunterladen';

                                    if($lang=='ar')
                                        $str2 = 'Share';
                                    elseif($lang=='en')
                                        $str2 = 'Share';
                                    else
                                        $str2 = 'Teilen';
                                    ?>
                                    <table>
                                        @foreach($newsletters as $ky=>$item)
                                            <tr>
                                                @if($lang!='ar')
                                                    <td><strong>{{ $item['title'] }}</strong><br/>{{ $item['edition'] }} – {{ $item['date'] }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ $item['file'] }}" class="icon-link download" download target="_blank">{{$str}}</a>
                                                        <a href="#" class="icon-link share" data-title="{{ $item['title'] }} {{ $item['edition'] }} – {{ $item['date'] }}">{{$str2}}</a>
                                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="display:none;">
                                                            <a href="" target="_blank">
                                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(24, 119, 242);">
                                                            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                                <path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(85, 172, 238);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_email" style="background-color: rgb(1, 102, 255);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M26 21.25v-9s-9.1 6.35-9.984 6.68C15.144 18.616 6 12.25 6 12.25v9c0 1.25.266 1.5 1.5 1.5h17c1.266 0 1.5-.22 1.5-1.5zm-.015-10.765c0-.91-.265-1.235-1.485-1.235h-17c-1.255 0-1.5.39-1.5 1.3l.015.14s9.035 6.22 10 6.56c1.02-.395 9.985-6.7 9.985-6.7l-.015-.065z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="text-center"><a href="#" class="icon-link share" data-title="{{ $item['title'] }} {{ $item['edition'] }} – {{ $item['date'] }}">{{$str2}}</a> <a href="{{ $item['file'] }}" class="icon-link download" download target="_blank">{{$str}}</a>
                                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="display:none;">
                                                            <a href="" target="_blank">
                                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(24, 119, 242);">
                                                            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                                <path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(85, 172, 238);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_email" style="background-color: rgb(1, 102, 255);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M26 21.25v-9s-9.1 6.35-9.984 6.68C15.144 18.616 6 12.25 6 12.25v9c0 1.25.266 1.5 1.5 1.5h17c1.266 0 1.5-.22 1.5-1.5zm-.015-10.765c0-.91-.265-1.235-1.485-1.235h-17c-1.255 0-1.5.39-1.5 1.3l.015.14s9.035 6.22 10 6.56c1.02-.395 9.985-6.7 9.985-6.7l-.015-.065z"></path></svg></span>
                                                            </a>
                                                            <a href="" target="_blank">
                                                                <span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><strong>{{ $item['title'] }}</strong><br/>{{ $item['edition'] }} – {{ $item['date'] }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </table>

                                @elseif($section['id']==26)
                                    <div class="gallery-wrap">
                                        <div class="owl-carousel owl-theme" id="gallery-carousel"  style="direction: ltr">
                                            @foreach($galleries as $gallery)
                                                <div class="item">
                                                    <img src="{{ asset('public/'.$gallery['thumbnail']) }}">
                                                    <div class="cover">
                                                        <h3>{{$gallery['title']}}<br/><a href="#" class="view"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row text-center gallery-navs" style="direction: ltr;">
                                        <a href="#" class="nav prev"></a>
                                        <a href="#" class="nav next"></a>
                                    </div>

                                    @foreach($galleries as $gallery)
                                        <div class="gallery-list">
                                            <a href="#" class="back-to-albums">< Back</a>
                                            <br/>
                                            <br/>
                                            <h3>{{ $gallery['title'] }}</h3>
                                            <br/>
                                            <ul class="gallery-ul">
                                                @foreach($gallery['photos'] as $id=>$photo)
                                                    <?php
                                                        if($lang=='en')
                                                            $caption = $photo->title_en;
                                                        elseif($lang=='ar')
                                                            $caption = $photo->title_ar;
                                                        else
                                                            $caption = $photo->title;
                                                    ?>
                                                    <li><a href="{{ asset('public/'.$photo->photo) }}" class="limage" data-lightbox="gallery-{{$photo->gallery_id}}" data-title="{{$caption}}"><img src="{{ asset('public/'.$photo->thumbnail) }}" width="100%"></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <?php $first = false; ?>

                            @if(isset($section['children']))
                                @foreach($section['children'] as $key=>$child)
                                    <div class="section {{ $first ? 'active' : '' }}" data-id="{{$key}}">
                                        {!! $child['content'] !!}
                                    </div>
                                    <?php $first = false; ?>
                                @endforeach
                            @endif
                        @endforeach

					</div>
				</div>
			</div>
		</section>
@endsection

@section('js')
    <script src="{{asset('public/js/inner-pages.2.js')}}"></script>
    <script src="{{asset('public/js/gallery.js')}}"></script>

    @if($lang=='ar')
        <script src="{{asset('public/js/macy-ar.js')}}"></script>
    @else
        <script src="https://cdn.jsdelivr.net/npm/macy@2"></script>
    @endif

    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="{{asset('public/vendor/lightbox/js/lightbox.js')}}"></script>

    <script>
        var masonry = new Macy({
            container: '#macy-container',
            trueOrder: false,
            waitForImages: false,
            useOwnImageLoader: false,
            debug: true,
            mobileFirst: true,
            columns: 1,
            margin: {
                y: 46,
                x: '5%',
            },
            breakAt: {
                1200: 2,
                940: 2,
                520: 1,
                400: 1
            },
        });

        function refreshMacy(){
            setTimeout(function(){
                masonry.recalculate();
            },300);
        }
    </script>
@endsection
