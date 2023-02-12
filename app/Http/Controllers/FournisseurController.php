<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Historique;


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
        
       
        $historique= new Historique;
        $historique->title='fournisseur ajouté';
        $historique->description='un fournisseur a été ajouté par :'.$fournisseur->added_by;
        $historique->seen=false;
        $historique->save();
 
        return redirect('addFournisseur')->with('status', ' le fournisseur a été ajouté ');
    }
    public function afficherFournisseur()
    {
        $fournisseurs= Fournisseur::all();
        
        return view('afficherFournisseur',['fournisseurs'=>$fournisseurs]);
       
    }
}
