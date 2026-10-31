<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'reg_no'     => 'required|string|max:50',
            'department' => 'required|in:Portal Login / Authentication Issue,Academic Registrar & Transcripts,Bursar & Tuition Clearance,Faculty of Computing & Informatics',
            'subject'    => 'required|string|max:150',
            'message'    => 'required|string|min:10|max:5000',
        ]);

        // Just save to the database. No emailing.
        ContactRequest::create($validated);

        return back()->with('success', 'Your request has been submitted successfully!');
    }
}