<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    public function dash(){
        return view('dashboard.contact')->with('contact',Contact::with('faqs')->findOrFail(1));
    }

    public function show(){
        $contact = Contact::with('faqs')->findOrFail(1);
        return view('contact')->with('contact',$contact);
    }

    public function update(ContactRequest $request, $id){
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->back()->with('success', 'Kontaktné informácie úspešne aktualizované');
    }
}
