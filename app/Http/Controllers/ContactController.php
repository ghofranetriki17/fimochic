<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     *
     */
    public function index()
    {
        $contacts = Contact::all()->groupBy('subject');
        return view('contact.index', compact('contacts'));
    }
    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
    
        return back()->with('success', 'Contact marqué comme lu!');
    }
    /**
     * Show the form for creating a new contact.
     *
     */
    
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Votre message a été envoyé avec succès!');
    }

    /**
     * Display the specified contact.
     *
     * @param  \App\Models\Contact  $contact
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param  \App\Models\Contact  $contact
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('contact.index')->with('success', 'Contact mis à jour avec succès!');
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param  \App\Models\Contact  $contact

     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact supprimé avec succès!');
    }
    public function getUnreadContacts()
{
    $unreadContacts = Contact::where('is_read', false)->get();
    return view('dashboard.layout.header', compact('unreadContacts'));
}
}
