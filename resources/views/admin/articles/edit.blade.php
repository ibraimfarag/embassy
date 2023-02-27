@extends('admin.partials.master')

@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>

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
                                    <h3>Edit Page | {{ $post->title_en }}</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('admin/content/articles/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>

                                <div class="row {{ $post->article_type_id==2 ? "hidden" : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Image</label><br/>
                                            @if($post->featured_image)
                                            <br/>
                                            <img src="{{asset('public/'.$post->featured_image)}}" width="300">
                                            <br/>
                                            <br/>
                                            @endif
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="featured_image"  value="" class="form-control" multiple>
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row {{ $post->article_type_id==2 ? "hidden" : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title DE</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->title}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content DE</label>
                                            <input type="hidden" name="content" value=" {{$post->content}} "/>
                                            <div class="summernote">
                                                {!! $post->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>

                                <div class="row {{ $post->article_type_id==2 ? "hidden" : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title EN</label>
                                            <input type="text" name="title_en" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->title_en}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content EN</label>
                                            <input type="hidden" name="content_en" value="{{$post->content_en}}"/>
                                            <div class="summernote">
                                                {!! $post->content_en !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                <div class="row {{ $post->article_type_id==2 ? "hidden" : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title AR</label>
                                            <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->title_ar}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content AR</label>
                                            <input type="hidden" name="content_ar" value="{{$post->content_ar}}"/>
                                            <div class="summernote">
                                                {!! $post->content_ar !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn-success" value="UPDATE">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
