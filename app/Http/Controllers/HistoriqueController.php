<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Historique;

use Illuminate\Http\Request;


class HistoriqueController extends Controller
{
    public function index()
    {
      
        return view('historique');
           
    }
   
    public function Historique()
    {
        $historiques= Historique::orderBy('id', 'DESC')->get();
        
        return view('historique',['historiques'=>$historiques]);
       
    }
}

    




