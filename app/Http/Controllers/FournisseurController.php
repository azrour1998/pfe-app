<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;


class FournisseurController extends Controller
{
    public function index()
    {
      
        return view('addFournisseur');
        
    }

    public function addFournisseur(Request $request)
    {
        $fournisseur = new Fournisseur;
        $fournisseur->name = $request->name;
        
        $fournisseur->save();
      
        return redirect('addFournisseur')->with('status', ' le fournisseur a été ajouté ');
    }
  
  
}
