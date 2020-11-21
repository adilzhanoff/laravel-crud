<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::all();
        // dd($contacts);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => ['required', 'min:11', 'max:11']
        ]);

        $contact = new Contacts([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number')
        ]);

        $contact->save();
        return redirect('/contacts')->with('success', 'The contact has been succesfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contacts::find($id);

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contacts::find($id);

        return view('contacts.edit', \compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => ['required', 'min:11', 'max:11']
        ]);

        $contact = Contacts::find($id);
        $contact->name = $request->get('name');
        $contact->phone_number = $request->get('phone_number');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact has been succesfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        
        return redirect('/contacts')->with('success', 'The contact has been succesfully deleted!');
    }
}
