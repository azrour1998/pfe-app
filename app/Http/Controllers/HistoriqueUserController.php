<?php

namespace App\Http\Controllers;

use App\Models\Historique;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HistoriqueUserController extends Controller
{
    public function Historiqueuser()
    {  $notSeen= Historique::where('seen','=','0')->select()->count();
        $historiques= DB::table('historiques')->select('title','description')->get();
        $user=auth()->user();
        $historiques= Historique::orderBy('created_at', 'DESC')->get();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $historiqueuser=Historique::where('description','LIKE','%'.$user->email)->get();
       
        return view('historiqueUser',['historiques'=>$historiques,'notSeen'=>$notSeen,'historiqueuser'=>$historiqueuser]);
       
    }   
    
    public function mark_as_seen($id){
        $historiques= Historique::where('id', $id)
                                ->update(['seen' => 1]);
                            

        $notSeen= Historique::where('seen','=','0')->select()->count();
       return redirect('historiqueUser')->with('status', ' Notification marquée comme lue ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
    }
  
    public function delete_item($id){
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $historiques= Historique::where('id', $id)
                                ->delete();
                              

       return redirect('historiqueUser')->with('status', ' Notification Supprimer ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
    }
}