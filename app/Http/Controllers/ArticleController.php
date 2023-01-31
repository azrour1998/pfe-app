<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

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

        $article->last_arrival =now();
        $article->minimal_quantity = $request->minimal_quantity;

        //TODO: cas particulier à traiter
        $article->image = 'path/to/image';
        

        $article->save();
        return redirect('home')->with('status', ' l\'Article a été ajouté ');
    }
}
