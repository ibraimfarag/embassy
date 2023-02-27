@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Post</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('admin/posts/delete/'.$post->id) }}">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('admin/posts/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                <div class="form-group">
                                    <label for="exampleInputName1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Title AR</label>
                                    <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="Title AR" value="{{ $post->title_ar }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content</label>
                                    <input type="hidden" name="content" value="{{ $post->content }}"/>
                                    <div class="summernote">
                                        {!! $post->content !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content AR</label>
                                    <input type="hidden" name="content_ar" value="{{ $post->content_ar }}"/>
                                    <div class="summernote">
                                        {!! $post->content_ar !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Publish Date</label>
                                    <input type="text" name="publish_date" class="form-control" id="exampleInputName1" placeholder="Publish Date" value="{{ $post->publish_date }}">
                                </div>
                                <div class="form-group">
                                    @if($post->thumbnail_small)
                                        <img src="{{ asset(''.$post->thumbnail_small) }}" width="100">
                                    @endif
                                    <label for="exampleInputName1">Thumbnail (400x400)</label>
                                    <input type="file" name="thumbnail_small" class="form-control" id="exampleInputName1" placeholder="" value="">
                                </div>
                                <div class="form-group">
                                    @if($post->thumbnail_large)
                                        <img src="{{ asset(''.$post->thumbnail_large) }}" width="100">
                                    @endif
                                    <label for="exampleInputName1">Thumbnail (900x500)</label>
                                    <input type="file" name="thumbnail_large" class="form-control" id="exampleInputName1" placeholder="" value="">
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
