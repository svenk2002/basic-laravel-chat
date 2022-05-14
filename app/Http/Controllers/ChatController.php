<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageEvent;

class ChatController extends Controller
{
    //shows the chat blade
    public function index()
    {
        return view('chat');
    }

    //fires a message event
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        //fire the message event
        event(new MessageEvent($request->message));

        return response()->json(['status' => 'ok']);
    }
}
