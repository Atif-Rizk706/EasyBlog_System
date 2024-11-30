<?php

namespace App\Http\Controllers;
use App\Mail\ContactUsReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConactController extends Controller
{
    public function contact(Request $request)
    {
        // Validate the contact form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);


        // Send confirmation email
        Mail::to($validatedData['email'])->send(new ContactUsReply($validatedData['name']));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
    }
}
