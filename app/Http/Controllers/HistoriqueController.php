<?php

namespace App\Http\Controllers;

use App\Models\Historique;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HistoriqueController extends Controller
{
    public function index()
    {
      
            $notSeen= Historique::where('seen','=','0')->select()->count();
            $historiques= DB::table('historiques')->select('title','description')->get();
            return view('historique',['historiques'=>$historiques,'notSeen'=>$notSeen]);
        
           
    }
   
    public function Historique()
    {
        $historiques= Historique::orderBy('created_at', 'DESC')->get();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return view('historique',['historiques'=>$historiques,'notSeen'=>$notSeen]);
       
    }

    public function mark_as_seen($id){
        $historiques= Historique::where('id', $id)
                                ->update(['seen' => 1]);
        $notSeen= Historique::where('seen','=','0')->select()->count();
       return redirect('historique')->with('status', ' Notification marquée comme lue ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
    }
  
    public function delete_item($id){
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $historiques= Historique::where('id', $id)
                                ->delete();
       return redirect('historique')->with('status', ' Notification Supprimer ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
    }
}

    




