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
                                    <h3>Edit Member</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                        <a href="{{ url('dms-cms/alumnis/delete/'.$post->id) }}">
                                            X Delete
                                        </a>
                                </div>
                            </div>

                            <br/>
                            <form action="{{ url('dms-cms/alumnis/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name AR</label>
                                            <input type="text" name="name_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->name_ar}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Study</label>
                                            <input type="text" name="study" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->study}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Study AR</label>
                                            <input type="text" name="study_ar" class="form-control" id="exampleInputName1" placeholder="" value="{{$post->study_ar}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">School Year</label>
                                    <select name="school_year" class="form-control" >
                                        <?php
                                        $y1 = 2015;
                                        $y2 = 2016;
                                        ?>
                                        @for($x=0;$x<100;$x++)
                                            <option {{$post->school_year == $y1 .' - '. $y2 ? 'selected' : '' }} value="{{ $y1 }} - {{ $y2 }}">{{ $y1 }} - {{ $y2 }}</option>
                                            <?php $y1++; $y2++;?>
                                        @endfor
                                    </select>
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
