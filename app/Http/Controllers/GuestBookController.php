<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestBook;

class GuestBookController extends Controller
{
    public function index()
    {
        $guestbooks = GuestBook::orderBy('id', 'desc')->paginate(10);
        return view('guestbook.index', ['guestbooks' => $guestbooks]);
    }

    public function destroy($id)
    {
        $guestbook = GuestBook::find($id);
        $guestbook->delete();
        return redirect('admin/guestbook');
    }

    public function show($id)
    {
        $guestbook = GuestBook::find($id);
        return view('guestbook.show', ['guestbook' => $guestbook]);
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

        return redirect('/admin/guestbook')->with('success', 'Message Sent!');
    }

    public function create()
    {
        $provinces = json_decode(file_get_contents("https://d.kapanlaginetwork.com/banner/test/province.json"), true);
        $cities = json_decode(file_get_contents('https://d.kapanlaginetwork.com/banner/test/city.json'), true);
        return view('guestbook.create', ['provinces' => $provinces, 'cities' => $cities]);
    }
}
