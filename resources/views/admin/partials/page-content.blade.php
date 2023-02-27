@if($item['type']=='text')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }} DE</label>
                            <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content]"  value="{{ $item['de'] }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['title_en']) ? $item['title_en'] : $item['slug'] }} EN</label>
                            <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content_en]"  value="{{ $item['en'] }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['title_ar']) ? $item['title_ar'] : $item['slug'] }} AR</label>
                            <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content_ar]"  value="{{ $item['ar'] }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($item['type']=='image')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }}
                                {{ $item['slug'] == 'main-img' ? ' (530x490)' : ''}}</label><br/>
                            <img src="{{ asset($item['en']) }}" width="200"><br/><br/>
                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="pageData[{{$item['slug']}}][content]"  value="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($item['type']=='video')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body row">
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
                </div>
            </div>
        </div>
    </div>
@elseif($item['type']=='external_video')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body row">
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
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }} DE</label>
                            <input type="hidden" name="pageData[{{$item['slug']}}][content]"  value="{{$item['de']}}">
                            <div class="summernote">
                                {!! $item['de'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['title_en']) ? $item['title_en'] : $item['slug'] }} EN</label>
                            <input type="hidden" name="pageData[{{$item['slug']}}][content_en]"  value="{{$item['en']}}">
                            <div class="summernote">
                                {!! $item['en'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">{{ isset($item['name']) ? $item['name'] : $item['slug'] }} AR</label>
                            <input type="hidden" name="pageData[{{$item['slug']}}][content_ar]"  value="{{$item['ar']}}">
                            <div class="summernote">
                                {!! $item['ar'] !!}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endif
