<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        $contactData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Send email (replace 'your-email@example.com' with your email address)
        Mail::send('emails.contact', $contactData, function ($message) use ($contactData) {
            $message->to('your-email@example.com')
                ->subject('Contact Form Submission from ' . $contactData['name']);
        });

        return redirect()->route('contact.show')->with('success', 'Your message has been sent successfully.');
    }
}

