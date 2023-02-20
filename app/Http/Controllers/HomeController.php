<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Historique;
use App\Models\Article;
use App\Models\User;

use App\Models\Fournisseur;
use App\Http\Controllers\stdClass;

class HomeController extends Controller

 {
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
        $data= Historique::orderBy('id', 'DESC')->get();
      
      
        $countHistoric=$data->count();
        $countArticles=count(Article::all());
        $countFournisseurs=count(Fournisseur::all());
        $countUsers=count(User::all());
        $date= date('Y-m-d H:i:s');
      
        return view("home",['countHistoric'=>$countHistoric,'countArticles'=>$countArticles,'countUsers'=>$countUsers,'fournisseurs'=>$countFournisseurs,'historiques'=>$data,'date'=>$date]);
    }
 }