<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $devices)
        <tr>
            <td>{{ $devices->name }}</td>
            <td>{{ $devices->date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
