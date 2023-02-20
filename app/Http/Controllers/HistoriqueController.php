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

    public function mark_as_seen($id){
        $historiques= Historique::where('id', $id)
                                ->update(['seen' => 1]);
       return redirect('historique')->with('status', ' Notification marquée comme lue ',['historiques'=>$historiques]);
    }
  
    public function delete_item($id){
        $historiques= Historique::where('id', $id)
                                ->delete();
       return redirect('historique')->with('status', ' Notification Supprimer ',['historiques'=>$historiques]);
    }
}

    




