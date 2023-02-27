<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>IP</th>
        <th>Source</th>
        <th>Fields</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['ip'] }}</td>
            <td>{{ $row['form'] }}</td>
            <td>
                @foreach($row['items'] as $item)
                    {{ $item['slug'] }} : {{ $item['value'] }} <br/>
                @endforeach
            </td>
            <td>{{ $row['created_at'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
