<table>
    <thead>
    <tr>
        @if(count($data))
            @foreach($data[0] as $key=>$item)
                <th>{{$key}}</th>
            @endforeach
        @endif
    </tr>
    </thead>
    <tbody>
    @if(count($data))
            @foreach($data as $key=>$entry)
                <tr>
                    <td>{{$entry['id']}}</td>
                    <td>{{$entry['name']}}</td>
                    <td>{{$entry['position']}}</td>
                    <td>{{$entry['organization']}}</td>
                    <td>{{$entry['phone']}}</td>
                    <td>{{$entry['email']}}</td>
                    <td>{{$entry['created_at']}}</td>
                    <td>{{$entry['updated_at']}}</td>
                </tr>
            @endforeach
    @else
        <p>No Entries yet.</p>
    @endif
    </tbody>
</table>
