@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Page</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form class="forms-sample" action="{{ url('admin/pages/update') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                <input type="hidden" value="{{ $page->id }}" name="id">
                <!-- <input type="hidden" value="{{ $page->slug }}" name="slug"> -->
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <a target="_blank" href="{{ URL('pages/preview/'.$page->id) }}">Click here to preview page</a>
                        </div>
                        </div>
                    </div>
                </div>
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
                                @if( $page->id == 16 )
                                    <input type="hidden"  name="page_id" value="15">
                                @elseif($page->id == 17)
                                    <input type="hidden"  name="page_id" value="15">
                                @else
                                    @include('admin.partials.pages.parent-page-form')
                                @endif
                                @include('admin.partials.pages.status')
                                @include('admin.partials.pages.template-page-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @include('admin.partials.pages.featured-images-list')
                                @include('admin.partials.pages.featured-image-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @include('admin.partials.pages.additional-content-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
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
