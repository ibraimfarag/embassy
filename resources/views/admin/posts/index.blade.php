@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $page->name }} Items</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    @if($pageSlug == 'blog')
                                        <br/>
                                        <a href="{{ url('admin/blog') }}">Back to blog page</a>
                                    @elseif($pageSlug == 'press')
                                        <br/>
                                        <a href="{{ url('admin/press') }}">Back to press page
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-6 text-right">
                                    @if($pageSlug == 'blog')
                                        <br/>
                                        <a href="{{ url('admin/posts/create/blog') }}">+ Add a blog post</a>
                                    @elseif($pageSlug == 'press')
                                        <br/>
                                        <a href="{{ url('admin/posts/create/press') }}">+ Add a press post
                                        </a>
                                    @endif
                                </div>
                            </div>



                            <table class="table table-striped" width="100%">
                                <th>
                                    <tr>
                                        <td>ID</td>
                                        <td>Title</td>
                                        <td>Created On</td>
                                    </tr>
                                </th>
                                @foreach($posts as $post)
                                        <tr>
                                            <td><a href="{{ url('admin/posts/edit/'.$post->id) }}">{{ $post->id }}</a></td>
                                            <td><a href="{{ url('admin/posts/edit/'.$post->id) }}">{{ $post->title }}</a></td>
                                            <td>{{ $post->created_at }}</td>
                                        </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
