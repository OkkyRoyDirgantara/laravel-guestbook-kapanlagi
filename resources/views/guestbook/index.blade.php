<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h1>List Guestbook</h1>
{{--Create--}}
<a href="{{route('guestbook.store')}}">Create</a>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Organization</th>
        <th>Content</th>
        <th>Address</th>
        <th>Province</th>
        <th>City</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guestbooks as $guestbook)
        <tr>
            <th>{{ $guestbook->id }}</th>
            <td>{{ $guestbook->first_name. " ".$guestbook->last_name }}</td>
            <td>{{ $guestbook->email }}</td>
            <td>{{ $guestbook->organization }}</td>
            <td>{{ $guestbook->body }}</td>
            <td>{{ $guestbook->address }}</td>
            <td>{{ $guestbook->province }}</td>
            <td>{{ $guestbook->city }}</td>
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
    </tbody>
</table>


{{ $guestbooks->links() }}


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
