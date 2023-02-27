@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create Testimonial</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('dms-cms/video-testimonials/store') }}" method="post" enctype="multipart/form-data">
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
                                            <label for="exampleInputName1">Name AR (Optional)</label>
                                            <input type="text" name="name_ar" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Field of Study</label>
                                            <input type="text" name="study" class="form-control" id="exampleInputName1" placeholder="" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Field of Study AR (Optional)</label>
                                            <input type="text" name="study_ar" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>


                                {{--<div class="row">--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="exampleInputName1">School Year (Optional)</label>--}}
                                            {{--<input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Video (Max Size: 5MB)</label><br/>
                                            <input type="file" accept="video/mp4" name="video"  value="" class="form-control" required>
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
