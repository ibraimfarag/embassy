@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create Member</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('dms-cms/teams/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name AR</label>
                                            <input type="text" name="name_ar" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title AR</label>
                                            <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Bio</label>
                                    <input type="hidden" name="bio" value=""/>
                                    <div class="summernote">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Bio AR</label>
                                    <input type="hidden" name="bio_ar" value=""/>
                                    <div class="summernote">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Photo (205x205)</label>
                                    <input type="file" name="photo" class="form-control" id="exampleInputName1" placeholder="" value="">
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
