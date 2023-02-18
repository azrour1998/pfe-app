<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Historique;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $historiques= Historique::all();
        $categories = DB::select('select categorie from categories');
        return view('addArticle',['categories'=>$categories],['historiques'=>$historiques]);
    }



    public function addArticle(Request $request)
    {
    

        $article = new Article;
        $article->designation = $request->designation;
        $article->category = $request->categorie;
        $article->quantity = $request->quantity;
        $article->price = $request->price;

        //TODO: récuperer les fournisseur de la base de donnée
        $article->fournisseur_id = 1;

        //TODO : show the team the way to get user auth ;) 
        $article->added_by=auth()->user()->email;
        $article->last_arrival =now();
        $article->minimal_quantity = $request->minimal_quantity;

        //TODO: cas particulier à traiter

             $destination_path = '/public/images/articles';
             $image = $request->file('image');
            
             $image_name = $image->getClientOriginalName();
             $path = $request->file('image')->storeAs($destination_path,$image_name);

             $article->image = $image_name;
            
        

        $article->save();
        $historiques= new Historique;
        $historiques->title='Un article a été ajouté';
        $historiques->description=$article->added_by.' viens d\'ajouter '.$article->quantity.' de  '.$article->designation.' au stock';
        $historiques->seen=false;
        $article-> $historiques =  $historiques;

        $historiques->save();
        return redirect('addArticle')->with('status', ' l\'Article a été ajouté ',['historiques'=>$historiques]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['unique:users'],
           
        ]);
    }
    public function afficherArticle()
    {
        $articles= Article::all();
        $historiques= Historique::all();
        return view('afficherArticle',['articles'=>$articles],['historiques'=>$historiques]);
       
    }
}
