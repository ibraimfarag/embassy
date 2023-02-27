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
                                    <h3>Edit Press Release</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('admin/content/announcements/delete/'.$post->id) }}"  onclick="return confirm('Are you sure you want to delete this item?');">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('admin/content/announcements/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Icon</label><br/>
                                            <br/>
                                            <img src="{{asset($post->icon)}}" width="50" style="background-color: #000;">
                                            <br/>
                                            <br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="icon"  value="" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title DE</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content DE</label>
                                            <input type="hidden" name="content" value="{!! $post->content !!}"/>
                                            <div class="summernote">
                                                {!! $post->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Link DE</label>
                                            <input type="text" name="link" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->link }}">
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title EN</label>
                                            <input type="text" name="title_en" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title_en }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content EN</label>
                                            <input type="hidden" name="content_en" value="{!! $post->content_en !!}"/>
                                            <div class="summernote">
                                                {!! $post->content_en !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Link EN</label>
                                            <input type="text" name="link_en" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->link_en }}">
                                        </div>
                                    </div>
                                </div>

                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title AR</label>
                                            <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title_ar }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content AR</label>
                                            <input type="hidden" name="content_ar" value="{!! $post->content_ar !!}"/>
                                            <div class="summernote">
                                                {!! $post->content_ar !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Link AR</label>
                                            <input type="text" name="link_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->link_ar }}">
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn-success" value="Save">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
