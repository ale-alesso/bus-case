<h1>Former Drivers</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Date of Deletion</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($drivers as $driver)
        <tr>
            <td>{{ ucfirst($driver->first_name) }} {{ ucfirst($driver->last_name) }}</td>
            <td>{{ $driver->email }}</td>
            <td>{{ $driver->deleted_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
