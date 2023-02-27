@extends('partials.master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $page = $contentService->getContentFront('consular-services',$lang);
?>
<?php
    if($lang=="de")
        $visaFaq = $contentService->getFaq(3,$lang);
    elseif ($lang=='ar')
        $visaFaq = $contentService->getFaq(5,$lang);
    else
        $visaFaq = $contentService->getFaq(1,$lang);

    if($lang=="de")
        $legalFaq = $contentService->getFaq(4,$lang);
    elseif ($lang=='ar')
        $legalFaq = $contentService->getFaq(6,$lang);
    else
        $legalFaq = $contentService->getFaq(2,$lang);
?>

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
                                @if($ky!='citizen-affairs')
                                    <li class="main-li {{ isset($section['children']) ? '' : 'no-child' }}">
                                        <a href="#" class="main-nav" {{ $section['content'] ? 'data-id='.$ky : '' }}>{{ $section['title'] }}</a>

                                        @if(isset($section['children']))
                                            <ul>
                                                @foreach($section['children'] as $key=>$child)
                                                    <li><a href="#" class="sub-nav" data-id="{{ $child['id'] == 10 ? 'visa-'.$key : $key }}">{{$child['title']}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                                <?php $first = false; ?>
                            @endforeach

                            @if($lang=='ar')
                                <li class="main-li no-child">
                                    <a href="#" class="main-nav" data-id="citizen-affairs">شؤون المواطنين</a>
                                </li>
                            @endif
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
                                    <div class="section {{ $first ? 'active' : '' }}" data-id="{{ $child['id'] == 10 ? 'visa-faq' : $key}}">
                                        {!! $child['content'] !!}

                                        @if($child['id'] == 9)
                                            <div class="panel-group" id="accordion">
                                                @foreach($visaFaq as $id=>$q)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a href="#content-{{$id}}" data-toggle="collapse" data-parent="#accordion" class="collapsed" aria-expanded="false">
                                                                    {!! $q['question'] !!}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="panel-colapse collapse" id="content-{{$id}}">
                                                            <div class="panel-body">
                                                                {!! $q['answer'] !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if($child['id'] == 14)
                                            <div class="panel-group" id="accordion">
                                                @foreach($legalFaq as $id=>$q)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a href="#content-{{$id}}" data-toggle="collapse" data-parent="#accordion" class="collapsed" aria-expanded="false">
                                                                    {!! $q['question'] !!}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="panel-colapse collapse" id="content-{{$id}}">
                                                            <div class="panel-body">
                                                                {!! $q['answer'] !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
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
