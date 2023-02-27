@extends('partials.master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $page = $contentService->getContentFront('bilateral-relations',$lang); ?>
<?php $timeline = $contentService->getTimeline($lang); ?>

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/inner-pages.2.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/timeline.css')}}">
@endsection

@section('content')
		
		<section id="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 clearfix" id="inner-sidebar">
						<ul>
                            <?php $first = true; ?>
                            @foreach($page as $ky=>$section)
                                @if($ky!='bilateral-relations')
                                    <li class="main-li {{ isset($section['children']) ? '' : 'no-child' }}">
                                        <a href="#" class="main-nav" {{ $section['content'] ? 'data-id='.$ky : '' }}>{{ $section['title'] }}</a>
                                        @if(isset($section['children']))
                                            <ul>
                                                @foreach($section['children'] as $key=>$child)
                                                    <li><a href="#" class="sub-nav" data-id="{{ $key }}">{{$child['title']}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
						</ul>
					</div>
					<div class="col-md-9 col-sm-9" id="section-content">
                        <?php $first = true; ?>
                        @foreach($page as $ky=>$section)

                            @if($section['content'])
                                <div class="section {{ $first ? 'active' : '' }}" data-id="{{$ky}}">
                                    {!! $section['content'] !!}

                                    @if($section['id']==16)

                                        <div class="timeline-wrap">
                                            <a href="#" class="nav prev"></a>
                                            <div class="owl-carousel owl-theme" id="main-timeline">
                                                @foreach($timeline as $item)
                                                    <div class="item"><img src="{{ asset('public/'.$item['photo']) }}"></div>
                                                @endforeach
                                            </div>
                                            <a href="#" class="nav next"></a>
                                        </div>
                                        <br/>
                                        <div id="time-line"><div class="space"><span class="line"></span></div><div class="space"><span class="dot"></span></div><div class="space"><span class="line"></span></div></div>
                                        <div class="owl-carousel owl-theme" id="sub-timeline">
                                            @foreach($timeline as $item)
                                                <div class="item">
                                                    <span class="line"></span>
                                                    <strong>{{ $item['date'] }}</strong><br/>
                                                    <p>{{ $item['content'] }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
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
    <script src="{{asset('public/js/timeline.js')}}"></script>
@endsection
