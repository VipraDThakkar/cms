<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\user_conference;
use App\Models\paper_type;


class AuthorController extends Controller
{
    //


  
    public function confregister($id){
       
       
    
        // Get the authenticated user's ID

        $userId = Session('userid');
        if ($userId  == "" || is_null($userId))
        {
            return redirect('/');
            die;    
        }        

        $conferenceId = $id;
        if ($conferenceId  == "" || is_null($conferenceId))
        {
            return redirect('/');
            die;    
        }        


        // Check if the user is already registered for the conference
        $existingRegistration = user_conference::where('user_id', $userId)->where('conference_id', $conferenceId)->get();;

        if ($existingRegistration->isEmpty()) {

            $user_conf = new user_conference;
            $user_conf->user_id = $userId;
            $user_conf->conference_id = $conferenceId;      
            $user_conf->save(); 
            session()->flash('success', 'You have successfully registered for the conference.');
            return redirect('/author/conference');

           
        }
        else
        {
            session()->flash('error', 'You are already registered for this conference.');
            return redirect('/author/conference');
            
        }
        
    }
       
    public function usersubmitspaper($id){

        session()->flash('confid',$id);
     //   session()->flash('confname', $confname);
        return view ('author/uploadpaper');

    }
}
