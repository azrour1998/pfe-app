<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Historique;


class FournisseurController extends Controller
{
    public function index()
    {
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return view('addFournisseur',['historiques'=>$historiques,'notSeen'=>$notSeen]);
           
    }

    public function addFournisseur(Request $request)
    {
        $adresse=$request->adresse.' '.$request->city.' '. $request->pays; 
        $fournisseur = new Fournisseur;
        $fournisseur->name = $request->name;
        $fournisseur->adresse =$adresse;
    
        $fournisseur->telephone = $request->telephone;
        $fournisseur->added_by=auth()->user()->email;

        $fournisseur->save();
        
       
        $historiques= new Historique;
        $historiques->title='fournisseur ajouté';
        $historiques->description='un fournisseur a été ajouté par :'.$fournisseur->added_by;
        $historiques->seen=false;
        $historiques->save();
        $notSeen= Historique::where('seen','=','0')->select()->count();
 
        return redirect('addFournisseur')->with('status', ' le fournisseur a été ajouté ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
    }
    public function afficherFournisseur()
    {
        $fournisseurs= Fournisseur::all();
        
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return view('afficherFournisseur',['fournisseurs'=>$fournisseurs],['historiques'=>$historiques,'notSeen'=>$notSeen]);
       
    }
    public function destroy($id)
    {

        $user = Fournisseur::findOrFail($id);
        $user->delete();

        return redirect()->route('afficherFournisseur')->with('success', 'Fournisseur Supprimé avec succès');

    }
}
