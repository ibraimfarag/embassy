@extends('admin.partials.master')

@section('content')
    <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                @if(Session::has('success'))
                    <div class="col-md-12">
                        <div class="alert-success alert">{{ Session::get('success') }}</div>
                    </div>
                @endif

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Page Content History</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                </div>
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                            </div>
                            @foreach($changes as $post)
                                @if(
                                str_replace(' ', '', strip_tags($post->content)) != str_replace(' ', '', strip_tags($post->previous_content)))
                                    <div class="row">
                                        @if(str_replace(' ', '', strip_tags($post->content)) != str_replace(' ', '', strip_tags($post->previous_content)))
                                            <div class="col-md-6">
                                                <strong>Previous</strong><br/>
                                                {{ str_replace(' ', '', strip_tags($post->previous_content)) }}</div>
                                            <div class="col-md-6">
                                                <strong>New</strong><br/>
                                                {{ str_replace(' ', '', strip_tags($post->content)) }}</div>
                                        @endif

                                        @if($post->content_ar != $post->previous_content_ar)
                                        <div class="col-md-6"><br/>
                                            <strong>Previous</strong><br/>
                                            {!! $post->previous_content_ar  !!}</div>
                                        <div class="col-md-6"><br/>
                                            <strong>New</strong><br/>
                                            {!! $post->content_ar !!}</div>
                                        @endif
                                        <div class="col-md-12"><hr/></div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('dms-cms/changes/restore',$changes['0']->change_id) }}">RESTORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
