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
        $adresse=$request->adresse.' '.$request->city.' '. $request->pays; 
        $fournisseur = new Fournisseur;
        $fournisseur->name = $request->name;
        $fournisseur->adresse =$adresse;
        $fournisseur->telephone = $request->telephone;
        $fournisseur->added_by=auth()->user();

        $fournisseur->save();
      
        return redirect('addFournisseur')->with('status', ' le fournisseur a été ajouté ');
    }
  
  
}
