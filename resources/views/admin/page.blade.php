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

            <form class="forms-sample" action="{{ url('admin/update') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                <input type="hidden" value="{{ $pageSlug }}" name="page">

                <?php $currentSlug = ''; ?>
                <?php $loops = 0; ?>
                @foreach($page as $item)
                    <?php $loops++; ?>
                    @if(strpos($item['slug'], 'sub-') > -1)
                        <?php $slg = substr($item['slug'], 0,strrpos($item['slug'], '-')); ?>

                        @if($currentSlug != $slg && $currentSlug=='')
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body row">

                        @elseif($currentSlug != $slg && $currentSlug!='')

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body row">

                        @elseif($currentSlug == $slg)
                            {{ '' }}
                        @else
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                            @if($item['type']=='text')
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }} DE</label>
                                        <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content]"  value="{{ $item['de'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['title_en']) ? $item['title_en'] : $item['slug'] }} EN</label>
                                        <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content]"  value="{{ $item['en'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['title_ar']) ? $item['title_ar'] : $item['slug'] }} AR</label>
                                        <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content_ar]"  value="{{ $item['ar'] }}">
                                    </div>
                                </div>
                            @elseif($item['type']=='image')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['name']) ? $item['name'] : $item['slug'] }} </label><br/>
                                        <img src="{{ asset(''.$item['en']) }}" width="200"><br/><br/>
                                        <input type="file" accept="image/x-png,image/gif,image/jpeg" name="pageData[{{$item['slug']}}][content]"  value="" class="form-control">
                                    </div>
                                </div>
                            @elseif($item['type']=='video')
                                <div class="col-md-12">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset(''.$item['en']) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <br/>
                                    <br/>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['name']) ? $item['name'] : $item['slug'] }}</label><br/>
                                        <input type="file" accept="video/mp4" name="pageData[{{$item['slug']}}][content]"  value="" class="form-control">
                                    </div>
                                </div>
                            @elseif($item['type']=='external_video')
                                <div class="col-md-12">
                                    <iframe height="480" width="500"
                                            src="{{ $item['en'] }}">
                                    </iframe>
                                    <br/>
                                    <br/>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['name']) ? $item['name'] : $item['slug'] }}</label><br/>
                                        <input type="text" name="pageData[{{$item['slug']}}][content]"  value="{{$item['en']}}" class="form-control">
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }} DE</label>
                                        <input type="hidden" name="pageData[{{$item['slug']}}][content]"  value="{{$item['de']}}">
                                        <div class="summernote">
                                            {!! $item['de'] !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['title_ar']) ? $item['title_ar'] : $item['slug'] }} AR</label>
                                        <input type="hidden" name="pageData[{{$item['slug']}}][content_ar]"  value="{{$item['ar']}}">
                                        <div class="summernote">
                                            {!! $item['ar'] !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ isset($item['title_en']) ? $item['title_en'] : $item['slug'] }} EN</label>
                                        <input type="hidden" name="pageData[{{$item['slug']}}][content_en]"  value="{{$item['en']}}">
                                        <div class="summernote">
                                            {!! $item['en'] !!}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        <?php $currentSlug = $slg; ?>
                        <?php if(count($page)==$loops) { ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    @elseif ($currentSlug!='')
                            <?php
                                $currentSlug = '';
                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.partials.page-content')
                    @else
                        @include('admin.partials.page-content')
                    @endif

                @endforeach

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
