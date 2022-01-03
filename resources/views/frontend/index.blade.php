@extends("../layouts.app")
@section("title", "Home")

@section("content")
{{--Create Form Guestbook--}}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
{{--            if Success --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form action="{{route('guest.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" class="form-control" id="organization" name="organization" placeholder="Enter name Organization">
                </div>

{{--                addreess--}}
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                </div>


                <div class="form-group">
                    <label for="province">Province</label>
                    <select class="form-control" id="province" name="province">
                        <option value="">Select Province</option>
                        @foreach($provinces as $province)
                            <option value="{{$province['nama']}}">{{$province['nama']}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" id="city" name="city">
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                            <option value="{{$city['nama']}}">{{$city['nama']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>

{{--    List Guestbook --}}
    @foreach($guestbooks as $guestbook)
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <div class="card flex-row">
                    <img src="https://icon-library.com/images/person-image-icon/person-image-icon-19.jpg" height="150px">
                    <div class="card-body">
                        <h5 class="card-title">{{$guestbook->first_name}} {{$guestbook->last_name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$guestbook->organization}}</h6>
                        <p class="card-text">{{$guestbook->body}}</p>
                        <p class="card-text"><small class="text-muted">{{$guestbook->created_at}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
{{$guestbooks->links()}}
</div>
@endsection
