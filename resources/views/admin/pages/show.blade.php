@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Pages</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pages</h4>
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th onclick="sortTable(1)">Name</th>
                                        <th onclick="sortTable(2)">Name Arabic</th>
                                        <th>Action</th>
                                        <th onclick="sortTable(2)">Date created</th>
                                        <th onclick="sortTable(2)">Last modified</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{ $page->name }}</td>
                                            <td>{{ $page->name_ar }}</td>
                                            <td><a href="{{ URL('admin/web-pages/'.$page->id.'/edit') }}">Edit</a>
                                                |
                                                <a target="_blank" href="{{ URL('pages/preview/'.$page->id) }}">Preview</a>
                                                |
                                                <a href="{{ URL('admin/pages/'.$page->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                            <td>{{ $page->created_at }}</td>
                                            <td>{{ $page->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection