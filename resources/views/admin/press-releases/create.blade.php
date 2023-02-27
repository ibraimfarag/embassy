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
                            <form action="{{ url('admin/content/press-releases/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Image</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="featured_image"  value="" class="form-control" multiple required>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title DE</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content DE</label>
                                            <input type="hidden" name="content" value=""/>
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title EN</label>
                                            <input type="text" name="title_en" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content EN</label>
                                            <input type="hidden" name="content_en" value=""/>
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title AR</label>
                                            <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content AR</label>
                                            <input type="hidden" name="content_ar" value=""/>
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Publish Date</label>
                                            <input type="text" class="form-control datetimepicker" readonly placeholder="" name="publish_date" value="">
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
