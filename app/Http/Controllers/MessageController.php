<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    // User sends message
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    // Staff views unread messages
    public function staffMessages()
    {
        $messages = Message::where('is_read', false)->get(); // unread messages
        $count = $messages->count();

        return view('staff.messages', compact('messages', 'count'));
    }

    // Staff replies
    public function sendReply(Request $request, $id)
    {
        $request->validate(['reply' => 'required|string']);
        
        $message = Message::findOrFail($id);
        $message->reply = $request->reply;
        $message->is_read = true;
        $message->save();

        return back()->with('success', 'Reply sent');
    }
    //mesages on staff
public function staff()
{
    $unreadMessages = Message::where('is_read', false)->get();
    $count = $unreadMessages->count();

    return view('home.staff', compact('unreadMessages', 'count'));
}
}
