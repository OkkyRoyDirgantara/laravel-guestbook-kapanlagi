<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
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
        app("\App\Http\Controllers\ProvinceController")->store();
        $provinces = Province::all();
        $cities = City::all();
        return view('guestbook.create', ['provinces' => $provinces, 'cities' => $cities]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:255',
        ]);

        $guestbook = GuestBook::find($id);
        $guestbook->first_name = $request->first_name;
        $guestbook->last_name = $request->last_name;
        $guestbook->email = $request->email;
        $guestbook->body = $request->message;
        $guestbook->address = $request->address;
        $guestbook->organization = $request->organization;
        $guestbook->city = $request->city;
        $guestbook->province = $request->province;
        $guestbook->save();

        return redirect('/admin/guestbook')->with('success', 'Message Sent!');
    }

    public function edit($id){
        app("\App\Http\Controllers\ProvinceController")->store();
        $provinces = Province::all();
        $cities = City::all();
        return view('guestbook.edit', ['guestbook' => GuestBook::find($id), 'provinces' => $provinces, 'cities' => $cities]);
    }
}
