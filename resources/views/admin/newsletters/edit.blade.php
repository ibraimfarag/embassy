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
                                    <h3>Newsletter Entry</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('admin/newsletters/delete/'.$post->id) }}"  onclick="return confirm('Are you sure you want to delete this item?');">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input readonly type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->name }}">
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Position</label>
                                            <input readonly type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->position }}">
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Organization</label>
                                            <input readonly type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->organization }}">
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Phone</label>
                                            <input readonly type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email</label>
                                            <input readonly type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->email }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
