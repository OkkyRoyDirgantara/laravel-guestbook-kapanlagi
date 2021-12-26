<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\GuestBook;

class GuestBookFrontEndController extends Controller
{
    public function index()
    {
        app("\App\Http\Controllers\ProvinceController")->store();
        //json to array
        $provinces = Province::all();
        $cities = City::all();


        $guestbooks = GuestBook::orderBy('id', 'desc')->paginate(10);
        return view('frontend.index', ['guestbooks' => $guestbooks, 'provinces' => $provinces, 'cities' => $cities]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:255',
        ]);

        $guestbook = new GuestBook;
        $guestbook->first_name = $request->first_name;
        $guestbook->last_name = $request->lastname;
        $guestbook->email = $request->email;
        $guestbook->body = $request->message;
        $guestbook->address = $request->address;
        $guestbook->organization = $request->organization;
        $guestbook->city = $request->city;
        $guestbook->province = $request->province;
        $guestbook->save();

        return redirect('/')->with('success', 'Message Sent!');
    }
}
