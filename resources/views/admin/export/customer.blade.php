<table border='1' width='100%' cellpadding='3' cellspacing="0" style='border-collapse: collapse;font-size:12px'>
    <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>User Phone</th>
            <th>User Email</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>
                {{ $loop->index+1 }}
            </td>

            <td>{{ $item->name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
