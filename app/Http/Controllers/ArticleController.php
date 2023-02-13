<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Historique;

class ArticleController extends Controller
{
    public function index()
    {
        return view('addArticle');
    }
 

    public function addArticle(Request $request)
    {
    

        $article = new Article;
        $article->designation = $request->designation;
       
        $article->quantity = $request->quantity;
        $article->price = $request->price;

        //TODO: récuperer les fournisseur de la base de donnée
        $article->fournisseur_id = 1;

        //TODO : show the team the way to get user auth ;) 
        $article->added_by=auth()->user()->email;
        $article->last_arrival =now();
        $article->minimal_quantity = $request->minimal_quantity;

        //TODO: cas particulier à traiter
        $article->image = 'path/to/image';
        

        $article->save();
        $historique= new Historique;
        $historique->title='article ajouté';
        $historique->description='un article a été ajouté par :'.$article->added_by;
        $historique->seen=false;
        $historique->save();
        return redirect('addArticle')->with('status', ' l\'Article a été ajouté ');
    }

    public function afficherArticle()
    {
        $articles= Article::all();
        
        return view('afficherArticle',['articles'=>$articles]);
       
    }
}
