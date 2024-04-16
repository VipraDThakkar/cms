<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paper;
use App\Models\conference;
use App\Models\user_conference;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PDF; // Import the PDF facade
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaperController extends Controller
{
    public function SendForApproval($id)
    {
       
        $userId = Session('userid');

        $pdf = paper::find($id);
        $pdf->status =1;
        $pdf->save();
        return redirect('/author/paper');

    }

    public function SendForApprovalEditor($id)
    {
       
        $userId = Session('userid');
        $pdf = paper::find($id);
        $pdf->status =2;
        $pdf->editorid = $userId;
        $pdf->editordatetime  = now(); 
        $pdf->save();
        return redirect('/admin/paper');

    }

    public function savereview(Request $request)
    { 
        $userId = Session('userid');
        $pdf = paper::find($request['paperid']);
        $pdf->reviewerrating = $request['fdrate'];
        $pdf->reviewermessage = $request['description'];
        $pdf->status =3;
        $pdf->reviewerid = $userId;
        $pdf->reviewerdatetime  = now(); 
        $pdf->save();
        return redirect('/admin/paper');
    }
   
    public function downloadPdf($id)
    {
        // Retrieve the paper by ID
        $pdfDocument = paper::findOrFail($id);
    
        // Generate a unique file name for the PDF
        $pdfFileName = Str::random(10) . '.pdf';
    
        // Save the blob data to a temporary PDF file
        Storage::put($pdfFileName, $pdfDocument->file_data);
    
        // Return the PDF file as a download response
        // return response()->download(storage_path('app/' .$pdfFileName), 'document.pdf')
        //                  ->deleteFileAfterSend(true);
        return response()->download(storage_path('app/' .$pdfFileName),  $pdfDocument->file_name)
        ->deleteFileAfterSend(true);


    }

    public function SendForApprovalReviewer($id)
    {

        $userId = Session('userid');
        $conference = DB::table('cms.conference as T1')
        ->join('cms.paper as T2', 'T2.conf_id', '=', 'T1.id')
        ->join('cms.user_conference as T3', 'T3.conference_id', '=', 'T1.id')
        ->join('cms.paperstatus as T4', 'T4.id', '=', 'T2.status')
        ->select('T1.conferencename', 'T1.startdate', 'T1.enddate','T2.status as Status', 'T2.file_name', 'T2.papername', 'T2.id as PaperID','T2.id as status',  'T1.id as ConfID', 'T3.id as userconfid','T4.paperstatus')
        ->where('T2.id', $id)
        ->get();
        $data=compact('conference');

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
      //  die;
      
        return view ('admin/paper-reviewer')->with($data);
    }

    public function index()
    {
        $userId = Session('userid');


        $conference = DB::table('cms.conference as T1')
    ->join('cms.paper as T2', 'T2.conf_id', '=', 'T1.id')
    ->join('cms.user_conference as T3', 'T3.conference_id', '=', 'T1.id')
    ->join('cms.paperstatus as T4', 'T4.id', '=', 'T2.status')
    ->select('T1.conferencename', 'T1.startdate', 'T1.enddate','T2.status as Status', 'T2.file_name', 'T2.papername', 'T2.id as PaperID', 'T1.id as ConfID', 'T3.id as userconfid','T4.paperstatus')
    ->where('T2.user_id', $userId )
    ->get();
       
        $data=compact('conference');
        return view ('author/paper')->with($data);;
   

        

    }
    public function upload(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // print_r($request->file('file'));
        // print_r(file_get_contents($request->file('file')));
        // print_r($request->file('file')->getClientOriginalName());
        // echo "</pre>";

        $userId = Session('userid');


        
        $pdf = new paper();
        $pdf->user_id = $userId;
         $pdf->conf_id = $request->confid;
         $pdf->papername = $request->papername;

        $pdf->file_name = $request->file('file')->getClientOriginalName();
        $pdf->file_data = file_get_contents($request->file('file'));
        
        $pdf->save();

        $usermaster = user_conference::where('conference_id', $request->confid)->where('user_id', $userId)->firstOrFail();
        $usermaster->paperupload = 1;
        $usermaster->save(); 

        return redirect('/author/paper');
    }
}
