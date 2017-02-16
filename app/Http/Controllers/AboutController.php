<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $contact = new Contacts();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'content' => 'required'
            ]);

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->content = $request->content;

        $contact
            ->fill($input)
            ->save();

        return redirect()->route('contact')
            ->with('message', 'Thanks for contacting us!');

    }
}
