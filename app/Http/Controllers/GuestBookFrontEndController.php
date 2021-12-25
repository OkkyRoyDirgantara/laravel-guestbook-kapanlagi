<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestBook;

class GuestBookFrontEndController extends Controller
{
    public function index()
    {
        //json to array
        $provinces = json_decode(file_get_contents("https://d.kapanlaginetwork.com/banner/test/province.json"), true);
        $cities = json_decode(file_get_contents('https://d.kapanlaginetwork.com/banner/test/city.json'), true);


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
