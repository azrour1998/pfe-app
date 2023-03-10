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

class documentationController extends Controller

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
      $alert=  Article::where('quantity','==','minimal_quantity')->count();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $countHistoric=$data->count();
        $countArticles=count(Article::all());
        $countFournisseurs=count(Fournisseur::all());
        $countUsers=count(User::all());
        $date= date('Y-m-d H:i:s');
        $quantiteArticleStock=(Article::all())->count();
        $quantityArticleCategorieA= Article::where('category','=','Santé et beauté')->count();
        $pourcentageA=($quantityArticleCategorieA/$quantiteArticleStock) *100;
        $quantityArticleCategorieB= Article::where('category','=','Article de sport')->count();
        $pourcentageB=($quantityArticleCategorieB/$quantiteArticleStock) *100;
        $quantityArticleCategorieC= Article::where('category','=','Article pour bébés et enfants')->count();
        $pourcentageC=($quantityArticleCategorieC/$quantiteArticleStock) *100;
        $quantityArticleCategorieD= Article::where('category','=','Produit artisanaux')->count();
        $pourcentageD=($quantityArticleCategorieD/$quantiteArticleStock) *100;
        $quantityArticleCategorieE= Article::where('category','=','Alimentation et boissons')->count();
        $pourcentageE=($quantityArticleCategorieE/$quantiteArticleStock) *100;
        $quantityArticleCategorieF= Article::where('category','=','informatique et bureau')->count();
        $pourcentageF=($quantityArticleCategorieF/$quantiteArticleStock) *100;
        $quantityArticleCategorieG= Article::where('category','=','Cuisine et maison')->count();
        $pourcentageG=($quantityArticleCategorieG/$quantiteArticleStock) *100;
         $quantityArticleCategorieH= Article::where('category','=','Bricolage, Jardin & animalerie')->count();
        $pourcentageH=($quantityArticleCategorieH/$quantiteArticleStock) *100;
       
        return view("documentation",['countHistoric'=>$countHistoric,'alert'=>$alert,'countArticles'=>$countArticles,'countUsers'=>$countUsers,'fournisseurs'=>$countFournisseurs,'historiques'=>$data,'date'=>$date,'notSeen'=>$notSeen,'pourcentageA'=> $pourcentageA,'pourcentageB'=> $pourcentageB,'pourcentageC'=> $pourcentageC,'pourcentageD'=> $pourcentageD,'pourcentageE'=> $pourcentageE,'pourcentageG'=> $pourcentageG,'pourcentageH'=> $pourcentageH,'pourcentageF'=> $pourcentageF]);
    }
 
  
 }