<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
@extends('partials.master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $page = $contentService->getContentFront('contact',$lang); ?>

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/inner-pages.2.css')}}">
@endsection

@section('content')
		
		<section id="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 clearfix" id="inner-sidebar">
						<ul>
                            <?php $first = true; ?>
                            @foreach($page as $ky=>$section)
                                <li class="main-li {{ $first ? 'active' : '' }} {{ isset($section['children']) ? '' : 'no-child' }}">
                                    <a href="#" class="main-nav {{ $first ? 'active' : '' }}" {{ $section['content'] ? 'data-id='.$ky : '' }}>{{ $section['title'] }}</a>

                                    @if(isset($section['children']))
                                        <ul>
                                            @foreach($section['children'] as $key=>$child)
                                                <li><a href="#" class="sub-nav" data-id="{{ $child['id'] == 7 ? 'visa-'.$key : $key }}">{{$child['title']}}</a></li>
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

                            @if($section['content'])
                                <div class="section {{ $first ? 'active' : '' }}" data-id="{{$ky}}">
                                    {!! $section['content'] !!}
                                </div>
                                <?php $first = false; ?>
                            @endif

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
@endsection
