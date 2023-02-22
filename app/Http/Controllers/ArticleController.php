<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Historique;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Categorie;
class ArticleController extends Controller
{
    public function index()
    {
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
      
        $categories = DB::select('select categorie from categories');
        $fournisseurs=fournisseur::all();
        $countArticles=count(Article::all());
       
        return view('addArticle',['categories'=>$categories,'fournisseurs'=>$fournisseurs,'historiques'=>$historiques,'notSeen'=>$notSeen]);
    }

    

    public function addArticle(Request $request)
    {
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $historiques=Historique::all();
        $article = Article::where('designation', '=',$request->designation)->first();
        if ($article === null) {

                $article = new Article;
                $article->designation = $request->designation;
                $article->category = $request->categorie;
                $article->quantity = $request->quantity;
                $article->price = $request->price;
                //TODO: récuperer les fournisseur de la base de donnée
                $article->fournisseur_id = $request->fournisseur;
                $article->added_by=auth()->user()->email;
                $article->last_arrival =now();
                $article->minimal_quantity = $request->minimal_quantity;
                $destination_path = '/public/images/articles';
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs($destination_path,$image_name);
                $article->image = $image_name;
                

                $article->save();
                $historiques= new Historique;
                $historiques->title='Un article a été ajouté';
                $historiques->description=$article->quantity.' '.$article->designation.'s ont été ajoutés au stock par '.$article->added_by;
                $historiques->seen=false;
                $article-> $historiques =  $historiques;
                $historiques->save();
              
                return redirect('addArticle')->with('status', 200,['historiques'=>$historiques,'notSeen'=>$notSeen,]);
            }else{
                return redirect('addArticle')->with('status', ' l\'Article exists déjà, modifier le directement dans la liste des articles ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
            }
        }
       
        
       
       
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['unique:users'],
           
        ]);
    }
    public function afficherArticle()
    {
        $articles= DB::table('articles')->join('fournisseurs','articles.fournisseur_id','=','fournisseurs.id') ->select('articles.*', 'fournisseurs.name as fournisseurName')->get();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $countArticles=count(Article::all());
     
        $historiques= Historique::all();
        return view('afficherArticle',['articles'=>$articles],['historiques'=>$historiques,'notSeen'=>$notSeen]);
       
    }
   
}
