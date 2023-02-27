@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create Press Release</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/faqs/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$id}}" name="id">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Question</label>
                                            <input type="text" name="question" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Answer</label>
                                            <input type="hidden" name="answer" value=""/>
                                            <div class="summernote">
                                            </div>
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
