<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\usermaster;
class LoginController extends Controller
{
    public function index()
    {
        return view ('login');
    }
    public function loginvalidate(Request $request)
    {

        $request->validate(
            [

                'username'  =>  'required',
                'password'  =>  'required'
            ]
        );
        print_r($request['role']);
 
        if ( $request['role'] == '0') { 
            $request->session()->flash('error', 'Please select the role');
            $request->session()->flash('username', $request['username']);
            $request->session()->flash('password', $request['password']);
            return redirect('/login'); 
        }
        else
        {
            $usermaster = usermaster::where('type', $request['role'])->where('username', $request['username'])->where('password',md5($request['password']))->get();

            if ($usermaster->isEmpty()) {
                $request->session()->flash('username', $request['username']);
                $request->session()->flash('password', $request['password']);
                $request->session()->flash('error', 'Invalied Username or password or role.');
                return redirect('/login');
            } else {
    
                // User(s) found
                foreach ($usermaster as $user) {
                    // Access user data, e.g., $user->name, $user->email, etc.
                    $request->session()->put('userid', $user->id);   
                    $request->session()->put('username', $user->username);   
                    $request->session()->put('name',$user->firstname);  
                    $request->session()->put('role',$user->type);   

                    break;       

                  
                }
               if($request['role'] == '4')
                    {return redirect('/author/dashboard');}
                else
                { return redirect('/admin/dashboard'); }
            }     
        }
        
    }
    public function logout()
    {
        session()->forget('userid');   
        session()->forget('username');   
        session()->forget('name');  
        session()->forget('role');  
        return redirect('/');
    }
    
}
