<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use App\Models\Article;
use App\Models\Fournisseur;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data= Historique::all();
        
        $countHistoric=$data->count();
        $countArticles=count(Article::all());
        $countFournisseurs=count(Fournisseur::all());
        
    
        return view("home",['countHistoric'=>$countHistoric,'countArticles'=>$countArticles,'fournisseurs'=>$countFournisseurs]);
    }
}
