@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $pageSlug }} Contents</h3>
                            @if($pageSlug == 'blog')
                                <br/>
                                <a href="{{ url('admin/posts/blog') }}">View Blog Post</a>
                            @elseif($pageSlug == 'press')
                                <br/>
                                <a href="{{ url('admin/posts/press') }}">View Press Post</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @inject('contentService', 'App\Services\ContentProvider')
            <?php $page = $contentService->getContents($pageSlug); ?>


            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form class="forms-sample" action="{{ url('dms-cms/update') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                            <input type="hidden" value="{{ $pageSlug }}" name="page">

                            @foreach($page as $item)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['name']) ? $item['name'] : $item['slug'] }}</label>
                                        <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content]"  value="{{ $item['en'] }}">
                                    </div>
                                </div>
                            @endforeach
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
