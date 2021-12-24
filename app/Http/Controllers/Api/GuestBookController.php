<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        //Descending order
        $guestBooks = GuestBook::orderBy('id', 'desc')->get();

        return response()->json($guestBooks);
    }

    public function show(GuestBook $guestBook)
    {
        return new GuestBookResource($guestBook);
    }

    public function store(Request $request)
    {
        $guestBook = GuestBook::create($request->all());

        return new GuestBookResource($guestBook);
    }

}
