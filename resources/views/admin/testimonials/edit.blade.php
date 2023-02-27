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
                                    <h3>Edit Member</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('dms-cms/testimonials/delete/'.$post->id) }}">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('dms-cms/testimonials/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name AR</label>
                                            <input type="text" name="name_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->name_ar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title AR</label>
                                            <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title_ar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content</label>
                                    <input type="hidden" name="content" value="{!! $post->content !!}"/>
                                    <div class="summernote">
                                        {!! $post->content !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content AR</label>
                                    <input type="hidden" name="content_ar" value="{!! $post->content_ar !!}"/>
                                    <div class="summernote">
                                        {!! $post->content_ar !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Photo (205x205)</label><br/>
                                    <img src="{{ asset('/').$post->photo }}"><br/><br/>
                                    <input type="file" name="photo" class="form-control" id="exampleInputName1" placeholder="" value="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Type</label>
                                    <select name="type" class="form-control" >
                                        <option value="teacher" {{ $post->type == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                        <option value="student" {{ $post->type == 'student' ? 'selected' : '' }}>Student</option>
                                    </select>
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
