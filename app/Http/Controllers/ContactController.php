<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function showContactMessages()
    {
        $messages = ContactMessage::all();
        return view('admin.contact_messages', compact('messages'));
    }


    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Save the message to the database
        $message = new ContactMessage();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('contact')->with('success', 'Your message has been submitted successfully.');
    }

    public function showMessages()
    {
        $messages = ContactMessage::all();

        return view('admin.contact_messages', ['messages' => $messages]);
    }
}
