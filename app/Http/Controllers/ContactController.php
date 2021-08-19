<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    function index(){
        $contacts = Contact::all();  
        return view("Contacts.index",compact('contacts'));
    }
    function create(){
        return view('contacts.create');
    }
    function store(Request $request){
         $request->validate([
             'first_name' => 'required',
             'last_name' => 'required' ,
             'email' => 'required' 

         ]);
         $contact = new Contact([
             'first_name' => $request->get('first_name'),
             'last_name' => $request->get('last_name'),
             'email' => $request->get('email'),
             'job_title' => $request->get('job_title'),
             'city' => $request->get('city'),
             'country' => $request->get('country'),
         ]);
         $contact->save();
         return redirect('/')->with('success','Contact saved!');
    }
    function edit($id){
        $contact = Contact::find($id);
        return view('Contacts.edit',compact('contact'));

    }
    function update(Request $request, $id){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required' ,
            'email' => 'required' 

        ]);
        $contact = Contact::find($id);
        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->job_title = $request->get('job_title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $contact->save();

        return redirect('/')->with('success','Contact updated!');
    }
    function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/')->with('sucess','Contact Deleted!');
    }
}
