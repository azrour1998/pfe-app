<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Article;

use App\Models\Fournisseur;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
   
   
    use AuthenticatesUsers;
   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'min:10'],
           
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    use AuthenticatesUsers;
   
    public function index()
    {     $users= User::all();
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return view('addUser',['historiques'=>$historiques,'notSeen'=>$notSeen],['users'=>$users]);
          
    
    }
    use AuthenticatesUsers;
    public function store(array $data)
    { $users= User::all();
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => Hash::make($data['password']), 
        ]);
       }

       use AuthenticatesUsers;
    public function addUser(Request $request)
    {
       
        $users = new User;
        $users ->name = $request->name;
        $users ->email=$request->email;
        $users ->telephone = $request->telephone;
        $users ->dob = $request->dob;
        $users ->role = $request->role;
        $users ->company = $request->company;
        $users ->password = $request->password;
        

        $users ->save();
        
       
        $historiques= new Historique;
        $historiques->title='Un utilisateur a été ajouté';
        $historiques->description='un utilisateur a été ajouté ';
        $historiques->seen=false;
        $users-> $historiques =  $historiques;

        $historiques->save();
        $this->middleware('guest');
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return redirect('addUser')->with('status', ' le user a été ajouté ',['historiques'=>$historiques,'notSeen'=>$notSeen]);
    }
   
    public function afficherUser()
    {
        $users= User::all();
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return view('afficherUser',['users'=>$users],['historiques'=>$historiques,'notSeen'=>$notSeen]);
       
    }

    public function userInfo($id){
        $user= User::where('id','=',$id)->first();
        $addedArticles=Historique::where('title','=','Un article a été ajouté')->count();
        $articleAddedByUser=Historique::where('title','=','Un article a été ajouté')->where('description','LIKE','%'.$user->email)->count();
        $contribution=$articleAddedByUser/$addedArticles*100;
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();
        return view('userInfo',['user'=>$user],['historiques'=>$historiques,'notSeen'=>$notSeen,'contribution'=>$contribution]);
    }

   

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('afficherUser')->with('success', 'lutilisateur Supprimé avec succès');

    }
    public function edit(){
        return view('userInfo');

    }

    public function update(Request $request){
       
        $users =Auth::user();
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->telephone = $request['telephone'];
        $users->company = $request['company'];
       



        $users->save();

        return back()->with('status','Profile Updated');
        
    }
        
    public function changePassword()

{   $user=Auth::user() ;
    $addedArticles=Historique::where('title','=','Un article a été ajouté')->count();
    $articleAddedByUser=Historique::where('title','=','Un article a été ajouté')->where('description','LIKE','%'.$user->email)->count();

    $contribution=$articleAddedByUser/$addedArticles*100;
   
    $data= Historique::orderBy('id', 'DESC')->get();
    $alert=  Article::where('quantity','==','minimal_quantity')->count();
      $notSeen= Historique::where('seen','=','0')->select()->count();
      $countHistoric=$data->count();
      $countArticles=count(Article::all());
      $countFournisseurs=count(Fournisseur::all());
      $countUsers=count(User::all());
    $historiques= Historique::all();
    $notSeen= Historique::where('seen','=','0')->select()->count();
   
       $date= date('Y-m-d H:i:s');
   return view('change-password',['user'=>$user,'countHistoric'=>$countHistoric,'alert'=>$alert,'countArticles'=>$countArticles,'countUsers'=>$countUsers,'fournisseurs'=>$countFournisseurs,'historiques'=>$data,'date'=>$date,'notSeen'=>$notSeen]);
}

public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        $user=Auth::user() ;

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $addedArticles=Historique::where('title','=','Un article a été ajouté')->count();
        $articleAddedByUser=Historique::where('title','=','Un article a été ajouté')->where('description','LIKE','%'.$user->email)->count();

        $contribution=$articleAddedByUser/$addedArticles*100;
       
        $data= Historique::orderBy('id', 'DESC')->get();
        $alert=  Article::where('quantity','==','minimal_quantity')->count();
          $notSeen= Historique::where('seen','=','0')->select()->count();
          $countHistoric=$data->count();
          $countArticles=count(Article::all());
          $countFournisseurs=count(Fournisseur::all());
          $countUsers=count(User::all());
        $historiques= Historique::all();
        $notSeen= Historique::where('seen','=','0')->select()->count();

           $date= date('Y-m-d H:i:s');
        return back()->with("status", "Password changed successfully!",['countHistoric'=>$countHistoric,'alert'=>$alert,'countArticles'=>$countArticles,'countUsers'=>$countUsers,'fournisseurs'=>$countFournisseurs,'historiques'=>$data,'date'=>$date,'notSeen'=>$notSeen,'user'=>$user]);
}
}

