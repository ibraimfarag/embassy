@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Add a New Bulletin</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/content/economic-bulletins/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">File</label><br/>
                                            <input type="file" name="file"  value="" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="UAE ECONOMIC BULLETIN">
                                        </div>
                                    </div>
                                </div>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Edition</label>
                                            <input type="text" name="edition" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date</label>
                                            <input type="text" name="date" class="form-control" id="exampleInputName1" placeholder="" value="">
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
