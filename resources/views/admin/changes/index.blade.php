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
                                    <h3>Page Content History</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                </div>
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                            </div>

                            <table class="table table-striped" width="100%">
                                    <tr>
                                        <td>Content</td>
                                        <td>Made On</td>
                                        <td>Actions</td>
                                    </tr>
                                @foreach($posts as $post)
                                        <tr>
                                            <td><a href="{{ url('dms-cms/changes/view/'.$post->change_id) }}">{{ $post->page_content->page->name }}</a></td>
                                            <td><a href="{{ url('dms-cms/changes/view/'.$post->change_id) }}">{{ $post->created_at }}</a></td>
                                            <td>
                                                <a href="{{ URL('dms-cms/changes/view/'.$post->change_id) }}">View</a> |
                                                <a href="{{ URL('dms-cms/changes/restore/'.$post->change_id) }}" onclick="return confirm('Are you sure you want to restore this item?');">Restore</a></td>
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
