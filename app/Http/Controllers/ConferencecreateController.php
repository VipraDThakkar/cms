<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Rules\StartBeforeEndDate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\conference;
use App\Models\user_conference;

use Illuminate\Support\Facades\DB;



class ConferencecreateController extends Controller
{
    //
    public function index()
    {
        // $conference = conference::all();

        $conference = Conference::select('conference.*')
        ->selectSub(function ($query) {
            $query->selectRaw('COUNT(*)')
                  ->from('user_conference')
                  ->whereColumn('conference.id', 'user_conference.conference_id');
        }, 'user_count')
        ->get();

        $data=compact('conference');

        //   echo "<pre>";
        // print_r($conference);
        // echo "</pre>";
        return view('admin/conference')->with($data);
    
    }

   
    public function authorindex()
    {
        $userId = Session('userid');
        $conference = DB::table('conference')
        ->leftJoin('user_conference', 'conference.id', '=', 'user_conference.conference_id')
        ->select('conference.id', 'conference.conferencename', 'conference.startdate', 'conference.enddate', 'conference.description', 'conference.topic','user_conference.user_id','user_conference.paperupload')
        ->where('user_conference.user_id', '=', $userId)
        ->orWhereNull('user_conference.user_id')
        ->get();
        $data=compact('conference');

        // echo "<pre>";
        // print_r($conference);
        // echo "</pre>";
         return view('author/conference')->with($data);
    
    }

    //
    public function confadd()
    {
     
        return view('admin/conference-add');
    
    }


    public function conferencesave(Request $request)
    {   
        // Validate the request data
        // $request->validate([
        //     'Conference'  =>  'required' ]);
        
        // If the validation passes, proceed to create and save the user
        $conference = new conference;
        $conference->conferencename = $request['conference'];
        $conference->description = $request['description'];
        $conference->startdate = $request['start_date'];
        $conference->topic = $request['topic'];
        $conference->save();   
        return redirect('/admin/conference');
    }

    public function delete($id){
    
    $conf = conference::find($id);
    if(!is_null($conf)){
        $conf->delete();
    }
    return redirect('/admin/conference');

    }

    
    public function edit($id){
    
        $conf = conference::find($id);
        if(is_null($conf)){
            // $conf->delete();
            return redirect('/admin/conference');
        }
       else{

        $data=compact('conf');
        return view('admin/conference-update')->with($data);

       } 
    
        }


    public function conferenceupdate($id,Request $request){
    
            $conf = conference::find($id);
            $conf->conferencename = $request['conference'];
            $conf->description = $request['description'];
            $conf->startdate = $request['start_date'];
            $conf->enddate = $request['end_date'];
            $conf->topic = $request['topic'];
            $conf->save();   
            
            return redirect('/admin/conference');

            }

            public function store(Request $request)
            {
                $validator = Validator::make($request->all(), [
                    'start_date' => 'required|date',
                    'end_date' => ['required', 'date', new StartBeforeEndDate],
                ]);
            
                if ($validator->fails()) {
                    return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
                }
            
                // If validation passes, continue with your logic
            }
}
