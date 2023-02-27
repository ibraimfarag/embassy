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
                                        <a href="{{ url('dms-cms/teams/delete/'.$post->id) }}">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('dms-cms/teams/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $post->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name AR</label>
                                            <input type="text" name="name_ar" class="form-control" id="exampleInputName1" value="{{ $post->name_ar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title AR</label>
                                            <input type="text" name="title_ar" class="form-control" id="exampleInputName1" value="{{ $post->title_ar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Bio</label>
                                    <input type="hidden" name="bio" value="{!! $post->bio !!}"/>
                                    <div class="summernote">
                                        {!! $post->bio !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Bio AR</label>
                                    <input type="hidden" name="bio_ar" value="{!! $post->bio !!}"/>
                                    <div class="summernote">
                                        {!! $post->bio !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset('/').$post->photo }}">
                                    <label for="exampleInputName1">Photo (205x205)</label>
                                    <input type="file" name="photo" class="form-control" id="exampleInputName1" value="">
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
