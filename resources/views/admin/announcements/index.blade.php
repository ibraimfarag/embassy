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
                                    <h3>Announcements</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ url('admin/content/announcements/create') }}">+ Add an Announcement</a>
                                </div>
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                            </div>

                            <table class="table table-striped" width="100%">
                                    <tr>
                                        <td>Title</td>
                                        <td>Created On</td>
                                        <td>Actions</td>
                                    </tr>
                                @foreach($posts as $post)
                                        <tr>
                                            <td><a href="{{ url('admin/content/announcements/edit/'.$post->id) }}">{{ $post->title_en }}</a></td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <a href="{{ URL('admin/content/announcements/edit/'.$post->id) }}">Edit</a> |
                                                <a href="{{ URL('admin/content/announcements/delete/'.$post->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                            </td>
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
