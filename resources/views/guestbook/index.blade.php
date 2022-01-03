@extends("../layouts.app")

@section('title', 'Guestbook List')

@section("content")
{{--Create--}}
    <div class="container">
        <h1>List Guestbook</h1>
        <a class="btn btn-success" href="{{route('guestbook.create')}}">Create</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Organization</th>
                <th>Message</th>
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DeleteGuestbook">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="DeleteGuestbook" tabindex="-1" role="dialog" aria-labelledby="DeleteGuestbookLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="DeleteGuestbookLabel">Delete Guestbook</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete this guestbook?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('guestbook.destroy',$guestbook->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <a href="{{ route('guestbook.show',$guestbook->id) }}" class="btn btn-primary btn-sm">Show</a>--}}
                        <a href="{{ route('guestbook.edit',$guestbook->id) }}" class="btn btn-warning mt-2">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{ $guestbooks->links() }}
    </div>
@endsection
