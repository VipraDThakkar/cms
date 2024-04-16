<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactus;

class ContactusController extends Controller
{
    //
    public function index()
    {

        return view ('admin/contactus');
    }


    public function save(Request $request)
    {   
        // Validate the request data
        $request->validate([
            'name'  =>  'required',
            'email'  =>  'required|email',
            'phonenumber'  =>  'required',
            'description'  =>  'required'

            
        ]);
        
        // If the validation passes, proceed to create and save the user
        $contact = new contactus;
        $contact->name = $request['name'];
        $contact->phonenumber = $request['phonenumber'];
        $contact->email = $request['email'];
        $contact->description = $request['description'];
        $contact->save();   
    
        // Redirect to the view page after successful registration
        return redirect('admin/dashboard');
    }
}
