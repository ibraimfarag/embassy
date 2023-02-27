@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create a Slide</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/content/home-slides/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Slide Image</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="photo"  value="" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
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
