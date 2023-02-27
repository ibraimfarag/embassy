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
                                    <h3>Edit Gallery</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('admin/content/galleries/delete/'.$post->id) }}">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('admin/content/galleries/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Gallery Thumbnail</label><br/>
                                            <br/>
                                            <img src="{{asset('public/'.$post->thumbnail)}}" width="300">
                                            <br/>
                                            <br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="thumbnail"  value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title EN</label>
                                            <input type="text" name="title_en" class="form-control" id="exampleInputName1" placeholder="" value="{{ $post->title_en }}">
                                        </div>
                                    </div>
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
                                            <label for="exampleInputEmail3">Gallery Images</label><br/>

                                            <div class="row">
                                                
                                            @foreach($post->photos()->get() as $upload)
                                            
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <img src="{{ asset('public/'.$upload->thumbnail) }}" width="200">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Title </label>
                                                        <input type="text" name="slide[{{$upload->id}}][title]"  value="{{$upload->title}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Title EN</label>
                                                        <input type="text" name="slide[{{$upload->id}}][title_en]"  value="{{$upload->title_en}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Title AR</label>
                                                        <input type="text" name="slide[{{$upload->id}}][title_ar]"  value="{{$upload->title_ar}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Replace Image</label>
                                                        <input type="file" accept="image/x-png,image/gif,image/jpeg" name="slide[{{$upload->id}}][photo]"  value="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="{{ url('admin/content/galleries/delete-slide/'.$upload->id) }}" style="font-size: 10px;">Remove</a>
                                                    </div>
                                                </div>
                                                
                                                <br/>
                                                <br/>
                                            @endforeach
                                            </div>
                                            
                                            <div class="row" id="photos">
                                                <div class="col-md-4">
                                                    <br/>
                                                    <a href="#" id="addMore">Add More Photos +</a>
                                                    <br/>
                                                    <br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

@section('js')
<script>
    $('#addMore').on('click',function(e){
        e.preventDefault();
        var imgUp = '<div class="col-md-4">'+
                                '<div class="form-group">'+
                                    '<label for="exampleInputName1">Title </label>'+
                                    '<input type="text" name="new_photo_title[]"  value="" class="form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="exampleInputName1">Title EN</label>'+
                                    '<input type="text" name="new_photo_title_en[]"  value="" class="form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="exampleInputName1">Title AR</label>'+
                                    '<input type="text" name="new_photo_title_ar[]"  value="" class="form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="exampleInputName1">Image</label>'+
                                    '<input type="file" accept="image/x-png,image/gif,image/jpeg" name="new_slides[]"  value="" class="form-control">'+
                                '</div>'+
                            '</div>';
        $('#photos').prepend(imgUp);
    });
</script>
@endsection
