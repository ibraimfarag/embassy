@extends('partials.master')

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/inner-pages.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/home.css')}}">
@endsection

@section('content')
		
		<section id="body">
			<div class="container">
					<div class="col-md-12 col-sm-12">
						<div class="row" id="article-single">
                            <?php
                            if($data['article_type_id']==2){
                                $back = url('/'.($lang!='de' ? $lang : ''));
                            }
                            else
                                $back = url(($lang!='de' ? $lang : '').'/media-and-info');
                            ?>

                            <?php
                                if($lang=='ar')
                                    $backStr = 'للرجوع';
                                elseif($lang=='de')
                                    $backStr = 'Back';
                                else
                                    $backStr = 'Back';
                            ?>

							<a href="{{ $back }}">< {{$backStr}}</a>
							</br>
							</br>

                            @if($data['article_type_id']==1)
                                <h1>{{$data['title']}}</h1>
                                <br/>
                                <br/>
                            @endif

                            @if($data['featured_image'])
                            <img src="{{asset('public/'.$data['featured_image'])}}" width="100%">
							</br>
							</br>
                            @endif
							{!! $data['content'] !!}

                            @if($data['slug']=='newsletter')
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{Session::get('error')}}
                                    </div>
                                @endif
                                <form action="{{ url('/newsletter-submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-12">
                                                <?php
                                                    if($lang=='ar')
                                                        $field = 'الاسم';
                                                    elseif($lang=='en')
                                                        $field = 'Name';
                                                    else
                                                        $field = 'Name';
                                                ?>
                                                <label>{{ $field }}<span class="yellow-txt">*</span></label>
                                                <input type="text" class="" name="name" placeholder="" required>
                                            </div>
                                            <div class="col-md-6">

                                                <?php
                                                if($lang=='ar')
                                                    $field = 'المنصب';
                                                elseif($lang=='en')
                                                    $field = 'Position';
                                                else
                                                    $field = 'Position';
                                                ?>
                                                <label>{{ $field }}</label>
                                                <input type="text" class="" name="position" placeholder="">
                                            </div>
                                            <div class="col-md-6">

                                                <?php
                                                if($lang=='ar')
                                                    $field = 'رقم الهاتف/الجوال:';
                                                elseif($lang=='en')
                                                    $field = 'Phone/Mobile Number';
                                                else
                                                    $field = 'Telefon/Handy';
                                                ?>
                                                <label>{{ $field }}</label>
                                                <input type="text" class="" name="phone" placeholder="">
                                            </div>
                                            <div class="col-md-12">

                                                <?php
                                                if($lang=='ar')
                                                    $field = '	الشركة/المنظمة';
                                                elseif($lang=='en')
                                                    $field = 'Company';
                                                else
                                                    $field = 'Organisation';
                                                ?>
                                                <label>{{ $field }}</label>
                                                <input type="text" class="" name="organization" placeholder="">
                                            </div>
                                            <div class="col-md-12">

                                                <?php
                                                if($lang=='ar')
                                                    $field = 'البريد الإلكتروني:';
                                                elseif($lang=='en')
                                                    $field = 'Email';
                                                else
                                                    $field = 'E-Mail';
                                                ?>
                                                <label>{{ $field }}<span class="yellow-txt">*</span></label>
                                                <input type="text" class="" name="email" placeholder="" required>
                                            </div>
                                                <?php
                                                if($lang=='ar')
                                                    $field = 'إرسال';
                                                elseif($lang=='en')
                                                    $field = 'Submit';
                                                else
                                                    $field = 'Absenden';
                                                ?>
                                            
                                            <input type="submit" value="{{$field}}">
                                        </div>
                                    </div>
                                </form>
                            @endif
                            <br/>
                            <br/>
						</div>
					</div>
<!--
					<div class="col-md-3 col-sm-4 sidebar">
						@include('partials.sidebar')
					</div>
-->
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
            dubaitime = moment(results.dubai.time);
            berlintime = moment(results.berlin.time).subtract(2,'hours');

            $('#berlinTemp').text(parseInt(results.berlin.consolidated_weather[0].the_temp));
            $('#berlinTime').text(berlintime.format('H:mm'));
            $('#berlinDay').text(berlintime.format('ddd'));
            $('#dubaiTemp').text(parseInt(results.dubai.consolidated_weather[0].the_temp));
            $('#dubaiTime').text(dubaitime.format('H:mm'));
            $('#dubaiDay').text(dubaitime.format('ddd'));
        });
    </script>
@endsection
