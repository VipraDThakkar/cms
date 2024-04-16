<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\paper;
use App\Models\conference;
use App\Models\user_conference;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //
    public function index()
    {


        $userId = Session('userid');

        $conference = DB::table('cms.conference as T1')
        ->join('cms.paper as T2', 'T2.conf_id', '=', 'T1.id')
        ->join('cms.user_conference as T3', 'T3.conference_id', '=', 'T1.id')
        ->join('cms.paperstatus as T4', 'T4.id', '=', 'T2.status')
        ->select('T1.conferencename', 'T1.startdate', 'T1.enddate','T2.status as Status', 'T2.file_name', 'T2.papername', 'T2.id as PaperID','T2.id as status',  'T1.id as ConfID', 'T3.id as userconfid','T4.paperstatus')
    //    ->where('T2.status', 2)
        ->get();
    


           
            $data=compact('conference');
            return view ('admin/paper')->with($data);;
    }
}
