<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function store()
    { $users= User::all();
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',   
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

   

    
    
        
    
}

