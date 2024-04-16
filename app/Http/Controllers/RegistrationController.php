<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usermaster;

class RegistrationController extends Controller
{
    public function index()
    {

        return view ('signup');
    }
    public function register(Request $request)
    {   
        // Validate the request data
        $request->validate([
            'username'  =>  'required',
            'firstname'  =>  'required',
            'middlename'  =>  'required',
            'lastname'  =>  'required',
            'role' => [ // Custom validation rule for 'role'
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value == '0') {
                        // If role is '0', flash error message and input data to session
                        // $request->session()->flash('error', 'Please select the role');
                        // $request->session()->flash('username', $request['username']);
                        // $request->session()->flash('firstname', $request['firstname']);
                        // $request->session()->flash('middlename', $request['middlename']);
                        // $request->session()->flash('lastname', $request['lastname']);
                        // $request->session()->flash('email', $request['email']);
                        // $request->session()->flash('phonenumber', $request['phonenumber']);
                        
                        // Fail validation
                        $fail('The selected role is invalid.');
                    }
                },
            ],
            'email'  =>  'required|email',
            'phonenumber'  =>  'required',
            'password'  =>  'required|confirmed',
            'password_confirmation'  =>  'required',
        ]);
        
        // If the validation passes, proceed to create and save the user
        $usermaster = new usermaster;
        $usermaster->username = $request['username'];
        $usermaster->firstname = $request['firstname'];
        $usermaster->middlename = $request['middlename'];
        $usermaster->lastname = $request['lastname'];
        $usermaster->email = $request['email'];
        $usermaster->phonenumber = $request['phonenumber'];
        $usermaster->password = md5($request['password']);
        $usermaster->type = $request['role'];
        $usermaster->save();   
    
        // Redirect to the view page after successful registration
        return redirect('/admin/user');
    }
    public function view() {

        if(session('userid'))
        {
            $usermaster = usermaster::all();
            $data=compact('usermaster');
            return view('admin/user')->with($data);
        }
        else
        {
            return view ('login');   
        }
       
       
    }
    public function delete($id){

    $usermaster = usermaster::find($id);
    if(!is_null($usermaster)){
        $usermaster->delete();
    }
    return redirect('/admin/user');

    }

    public function edit($id){
    
        $usermaster = usermaster::find($id);
        if(is_null($usermaster)){
            // $conf->delete();
            return redirect('/register');
        }
       else{

        $data=compact('usermaster');
        return view('/signup-update')->with($data);

       } 
    
        }

    public function update($id,Request $request){
    
        $usermaster = usermaster::find($id);
        $usermaster->username = $request['username'];
        $usermaster->firstname = $request['firstname'];
        $usermaster->middlename = $request['middlename'];
        $usermaster->lastname = $request['lastname'];
        $usermaster->email = $request['email'];
        $usermaster->phonenumber = $request['phonenumber'];
        $usermaster->password = md5($request['password']);
        $usermaster->type = $request['role'];
        $usermaster->save();   
        return redirect('/admin/user');

        }

}

