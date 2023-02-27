@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Form Entries</h3>

                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ url('admin/entries/export') }}">EXPORT</a>
                                </div>
                            </div>

                            <table class="table table-striped" width="100%">
                                <th>
                                    <tr>
                                        <td>ID</td>
                                        <td>IP</td>
                                        <td>Source</td>
                                        <td>Created On</td>
                                    </tr>
                                </th>
                                @foreach($entries as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->ip }}</td>
                                            <td>{{ $post->form }}</td>
                                            <td style="max-width:300px">
                                                @foreach($post->items as $item)
                                                    {{ $item->slug }} : {{ $item->value }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td><a href="{{ url('admin/entries/delete/'.$post->id) }}">Delete</a></td>
                                        </tr>
                                @endforeach
                            </table>
                            <hr>
                            {{ $entries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
