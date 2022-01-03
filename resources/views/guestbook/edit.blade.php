@extends("../master")

@section('title', 'Edit Guestbook')
@section("content")
<div class="container">
    <a href="{{route('guestbook.index')}}" class="btn btn-danger mt-4">X</a>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Guestbook</h1>
            <form action="{{ route('guestbook.update', $guestbook->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $guestbook->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $guestbook->last_name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $guestbook->email }}">
                </div>

{{--                Organization--}}
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" class="form-control" name="organization" id="organization" value="{{ $guestbook->organization }}">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="3">{{ $guestbook->body }}</textarea>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $guestbook->address }}">
                </div>
                <div class="form-group">
                    <label for="province">Province</label>
                    <select class="form-control" id="province" name="province">
                        <option value="{{ $guestbook->province }}">{{ $guestbook->province }}</option>
                        @foreach($provinces as $province)
                            <option value="{{$province['nama']}}">{{$province['nama']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" id="city" name="city">
                        <option value="{{ $guestbook->city  }}">{{ $guestbook->city  }}</option>
                        @foreach($cities as $city)
                            <option value="{{$city['nama']}}">{{$city['nama']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
