@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Post</h3>
                            <form action="{{ url('admin/posts/post') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="{{ $page->id }}" name="page_id">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Title AR</label>
                                    <input type="text" name="title_ar" class="form-control" id="exampleInputName1" placeholder="Title AR" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content</label>
                                    <input type="hidden" name="content" value=""/>
                                    <div class="summernote">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content AR</label>
                                    <input type="hidden" name="content_ar" value=""/>
                                    <div class="summernote">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Publish Date</label>
                                    <input type="text" name="publish_date" class="form-control" id="exampleInputName1" placeholder="Publish Date" value="}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Thumbnail (400x400)</label>
                                    <input type="file" name="thumbnail_small" class="form-control" id="exampleInputName1" placeholder="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Thumbnail (900x500)</label>
                                    <input type="file" name="thumbnail_large" class="form-control" id="exampleInputName1" placeholder="" value="">
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
