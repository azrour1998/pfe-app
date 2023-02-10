<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historiques;
use App\Models\Article;
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
        $data= Historiques::all();
        
        $countHistoric=$data->count();
        $countArticles=count(Article::all());
    
        return view("home",['countHistoric'=>$countHistoric,'countArticles'=>$countArticles]);
    }
}
