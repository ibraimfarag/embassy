@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create a Gallery</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/content/galleries/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Gallery Thumbnail</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="thumbnail"  value="" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title EN</label>
                                            <input type="text" name="title_en" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
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
                                            <hr/>
                                            <label for="exampleInputEmail3" style="font-weight:bold">Gallery Images</label><br/><br/>
                                            <div class="row" id="photos">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Title </label>
                                                        <input type="text" name="photo_title[]"  value="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Title EN</label>
                                                        <input type="text" name="photo_title_en[]"  value="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Title AR</label>
                                                        <input type="text" name="photo_title_ar[]"  value="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Image</label>
                                                        <input type="file" accept="image/x-png,image/gif,image/jpeg" name="slide[]"  value="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <br/>
                                                    <br/>
                                                    <br/>
                                                    <a href="#" id="addMore">Add More Photos +</a>
                                                </div>
                                            </div>
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

@section('js')
<script>
    $('#addMore').on('click',function(e){
        e.preventDefault();
        $('#photos').prepend($('#photos .col-md-4').first().clone());
    });
</script>
@endsection
