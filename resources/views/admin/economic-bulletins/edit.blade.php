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
                                    <h3>Edit Bulletin</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('admin/content/economic-bulletins/delete/'.$post->id) }}"  onclick="return confirm('Are you sure you want to delete this item?');">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('admin/content/economic-bulletins/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">File</label><br/>
                                            Current File: <a href="{{ asset($post->file) }}">{{ asset($post->file) }}</a>
                                            <br/>
                                            
                                            <input type="file" name="file"  value="" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                </div>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Edition</label>
                                            <input type="text" name="edition" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->edition }}">
                                        </div>
                                    </div>
                                </div>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date</label>
                                            <input type="text" name="date" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->date }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                
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
