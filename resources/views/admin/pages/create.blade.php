@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create Page</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form class="forms-sample" action="{{ url('admin/pages') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @include('admin.partials.pages.content-en-form')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @include('admin.partials.pages.content-ar-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @include('admin.partials.pages.parent-page-form')
                                @include('admin.partials.pages.status')
                                @include('admin.partials.pages.template-page-form')
                                @include('admin.partials.pages.additional-content-form')
                                @include('admin.partials.pages.featured-image-form')
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
@endsection
