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
                                    <h3>Edit Timeline</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('admin/content/timeline/delete/'.$post->id) }}"  onclick="return confirm('Are you sure you want to delete this item?');">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('admin/content/timeline/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date</label>
                                            <input type="text" name="date" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->date}}">
                                            <br/>
                                            <hr/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Image</label>
                                            <br/>
                                            <img src="{{asset('public/'.$post->photo)}}" width="300">
                                            <br/>
                                            <br/>
                                            <input type="file" name="photo" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="exampleInputName1" placeholder="" value="" required>
                                            <br/>
                                            <hr/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <textarea name="content" rows="15" class="form-control" id="exampleInputName1">{{$post->content}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content EN</label>
                                            <textarea name="content_en" rows="15" class="form-control" id="exampleInputName1">{{$post->content_en}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content AR</label>
                                            <textarea name="content_ar" rows="15" class="form-control" id="exampleInputName1">{{$post->content_ar}}</textarea>
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
