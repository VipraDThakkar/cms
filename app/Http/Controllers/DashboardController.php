<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

      if ( Session('role') > 0 && Session('role') < 4)
      {
        return view ('admin/dashboard');
      }else
      {
        return redirect('/');
      }    

     
    }

    public function authorindex()
    {
      if ( Session('role') == 4)
      {
        return view ('author/dashboard');
      }else
      {
        return redirect('/');
      } 
    }
}
