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
}
