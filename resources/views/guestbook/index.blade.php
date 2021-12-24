<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>List Guestbook</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Organization</th>
        <th>Content</th>
        <th>Address</th>
        <th>Province</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    @foreach($guestbooks as $guestbook)
        <tr>
            <td>{{ $guestbook->id }}</td>
            <td>{{ $guestbook->first_name. " ".$guestbook->last_name }}</td>
            <td>{{ $guestbook->email }}</td>
            <td>{{ $guestbook->organization }}</td>
            <td>{{ $guestbook->body }}</td>
            <td>{{ $guestbook->address }}</td>
            <td>{{ $guestbook->province }}</td>
            <td>{{ $guestbook->created_at }}</td>
            <td>{{ $guestbook->updated_at }}</td>
            <td>
                <form action="{{ route('guestbook.destroy',$guestbook->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
                <a href="{{ route('guestbook.show',$guestbook->id) }}" class="btn btn-primary btn-sm">Show</a>
            </td>
        </tr>
    @endforeach
</table>


{{ $guestbooks->links() }}

</body>
</html>
