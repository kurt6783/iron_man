<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index ()
    {
        return 'index';
        
        $messages = Message::select(
            'id',
            'member',
            'message',
            'created_at',
        )
            ->orderBy('created_at', 'DESC')
            ->get();

        return $messages;
    }

    public function create(Request $request)
    {
        Message::create([
            'member' => $request->member,
            'message' => $request->message,
        ]);

        return 'success';
    }

    public function detail($message_id)
    {
        $message = Message::select(
            'id',
            'member',
            'message',
            'created_at',
            'updated_at',
        )
            ->where('id', $message_id)
            ->first();
        
        return $message;
    }

    public function update(Request $request, $message_id)
    {
        Message::where('id', $message_id)
            ->update([
                'message' => $request->message,
            ]);
        
        return 'success';
    }

    public function delete($message_id)
    {
        Message::where('id', $message_id)
            ->delete();

        return 'success';
    }
}
