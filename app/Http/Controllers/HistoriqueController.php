<?php

namespace App\Http\Controllers;

use App\Models\Historique;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HistoriqueController extends Controller
{
    public function index()
    {
      
        
            $historiques= DB::table('historiques')->select('title','description')->get();
            return view('historique',['historiques'=>$historiques]);
        
           
    }
   
    public function Historique()
    {
        $historiques= Historique::orderBy('id', 'DESC')->get();
        
        return view('historique',['historiques'=>$historiques]);
       
    }
  
}

    




