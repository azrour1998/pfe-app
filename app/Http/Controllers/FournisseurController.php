<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Historique;


class FournisseurController extends Controller
{
    public function index()
    {
      
        return view('historique');
           
    }

 
}
