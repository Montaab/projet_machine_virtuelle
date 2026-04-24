<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Importez la façade Auth

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list_utilisateurs()
    {
        $users = User::all();

        return view('users.list_users', compact('users'));
    }
    public function ajouter_utilisateur()
    {
        return view('users.ajouter_users');
    }
    public function modifier_utilisateur($id)
    {
        $users= User::find($id);

        return view('users.modifier_users',compact('users'));
    }





    public function ajouter_utilisateur_traitement(Request $request){
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'prénom' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'tel' => 'required|string|min:8|max:20',
            

            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ], [
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
        ]
    
    );
        
        $user = new User();
        $user->name = $request->name;
        $user->prénom = $request->prénom;
        $user->email = $request->email;
        $user->tel = $request->tel;
        

        $user->password = Hash::make($request->password); // Hash du mot de passe
        $user->role = $request->role;
        $user->save();
        
        return redirect('/ajouter_utilisateur')->with('status', 'Utilisateur ajouté avec succès.');
        
    }

    public function modifier_utilisateur_traitement(Request $request,User $user){
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'prénom' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email,'. $user->id,
            'tel' => 'required|string|min:8|max:20',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.email' => 'Veuillez entrer une adresse email valide.',
          
        ]
    
        );
        if (Auth::user()->role !== 'Admin') {
            $request->merge(['role' => $user->role]);
        }
        $user =  User::find($request->id);
        $user->name = $request->name;
        $user->prénom = $request->prénom;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->password = Hash::make($request->password); // Hash du mot de passe
        $user->role = $request->role;
   
        $user->update();
        return redirect('/list_utilisateurs')->with('status', 'Utilisateur modifié avec succès.');



    }

    public function supprimer_utilisateur($id)
    {
        $users= User::find($id);
        $users->delete();
        return redirect('/list_utilisateurs')->with('status', 'Utilisateur supprimé avec succès.');

        
    }
}
