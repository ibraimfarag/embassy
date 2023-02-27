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
                                    <h3>Edit Section Photos</h3>
                                    {{ \Illuminate\Support\Str::upper($post->slug) }}
                                </div>
                            </div>
                            <br/>
                            <form action="{{ url('dms-cms/sections/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Upload Slide Images (1000x667)</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="slide[]"  value="" class="form-control" multiple required>
                                            <br/>
                                            <br/>
                                            <div class="row">
                                                @foreach($post->uploads()->get() as $upload)
                                                    <div class="col-md-4">
                                                        <img src="{{ asset($upload->path.'/'.$upload->file_name) }}" width="200">
                                                        <a href="{{ url('dms-cms/sections/delete-slide/'.$upload->id) }}" style="font-size: 10px;">Remove</a>
                                                        <br/>
                                                        <br/>
                                                    </div>
                                                @endforeach
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
