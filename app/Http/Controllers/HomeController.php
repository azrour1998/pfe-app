<?php

namespace App\Http\Controllers;

use AddCategoryToArticlesTables;
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
      DB::table('categories')->insert([
        ['categorie' => 'Carte mère'],
        ['categorie' => 'Imprimante'],
        ['categorie' => 'Disque dur'],
        ['categorie' => 'Unité centrale'],
        ['categorie' => 'Écran dordinateur'],
        ['categorie' => 'Souris (informatique)'],
        ['categorie' => 'Ordinateurs portables'],
        ['categorie' => 'Vidéoprojecteur'], 
    ]);
        $data= Historique::orderBy('id', 'DESC')->get();
      $alert=  Article::where('quantity','==','minimal_quantity')->count();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $countHistoric=$data->count();
        $countArticles=count(Article::all());
        $countFournisseurs=count(Fournisseur::all());
        $countUsers=count(User::all());
        $date= date('Y-m-d H:i:s');
        $quantiteArticleStock=(Article::all())->count();
        $quantityArticleCategorieA= Article::where('category','=','Carte mère')->count();
        $pourcentageA=round(($quantityArticleCategorieA/$quantiteArticleStock) *100,2);
        $quantityArticleCategorieB= Article::where('category','=','Imprimante')->count();
        $pourcentageB=round(($quantityArticleCategorieB/$quantiteArticleStock) *100,2);
        $quantityArticleCategorieC= Article::where('category','=','Disque dur')->count();
        $pourcentageC=round(($quantityArticleCategorieC/$quantiteArticleStock) *100,2);
        $quantityArticleCategorieD= Article::where('category','=','Unité centrale')->count();
        $pourcentageD=round(($quantityArticleCategorieD/$quantiteArticleStock) *100,2);
        $quantityArticleCategorieE= Article::where('category','=','Vidéoprojecteur')->count();
        $pourcentageE=round(($quantityArticleCategorieE/$quantiteArticleStock) *100,2);
        $quantityArticleCategorieF= Article::where('category','=','Ordinateurs portables')->count();
        $pourcentageF=round(($quantityArticleCategorieF/$quantiteArticleStock) *100,2);
        $quantityArticleCategorieG= Article::where('category','=','Écran dordinateur')->count();
        $pourcentageG=round(($quantityArticleCategorieG/$quantiteArticleStock) *100,2);
         $quantityArticleCategorieH= Article::where('category','=','Souris (informatique)')->count();
        $pourcentageH=round(($quantityArticleCategorieH/$quantiteArticleStock) *100,2);
       
        return view("home",['countHistoric'=>$countHistoric,'alert'=>$alert,'countArticles'=>$countArticles,'countUsers'=>$countUsers,'fournisseurs'=>$countFournisseurs,'historiques'=>$data,'date'=>$date,'notSeen'=>$notSeen,'pourcentageA'=> $pourcentageA,'pourcentageB'=> $pourcentageB,'pourcentageC'=> $pourcentageC,'pourcentageD'=> $pourcentageD,'pourcentageE'=> $pourcentageE,'pourcentageG'=> $pourcentageG,'pourcentageH'=> $pourcentageH,'pourcentageF'=> $pourcentageF]);
    }
 
  
 }