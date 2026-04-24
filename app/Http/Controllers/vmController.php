<?php

namespace App\Http\Controllers;
use App\Models\VirtualMachine;
use App\Models\User;

use Illuminate\Support\Facades\Auth; // Importez la façade Auth

use Illuminate\Http\Request;

class vmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function list_vms() {
        $user = Auth::user();
    
        if ($user->role == "Admin") {
            $vms = VirtualMachine::with('user')->get();
        } else {
            $vms = VirtualMachine::where('user_id', $user->id)->get();
        }
    
        return view('vms.list_vms', compact('vms'));
    }
    
    public function ajouter_vm()
    {
        $users = User::all(); // Récupère tous les utilisateurs depuis la base de données

        return view('vms.ajouter_vms',compact('users'));
    }
    public function modifier_vm($id)
    {
        $vms = VirtualMachine::find($id);
        $users = User::all(); 
        //$vms1 = VirtualMachine::with('user')->where('user_id', $user->id)->get();
        return view('vms.modifier_vms',compact('vms','users'));
    }
    public function ajouter_vm_traitement(Request $request){
        $request->validate([
            'user_id' => 'nullable|string',

            'nom' => 'required|string|min:2|max:255',
            'adresse_ip' => 'required|string',
            'description' => 'required|string',
            'cpu' => 'required|string',
            'memoire' => 'required|string',
            'etat' => 'required|string',
            'alert' => 'nullable|string',

            
        ]
     );
     $users = User::all(); // Récupère tous les utilisateurs depuis la base de données

        $vm = new VirtualMachine();
        $user = Auth::user();
        if ($user->role == "Admin") {
            $vm->user_id = $request->user_id;
        } else {
            $vm->user_id = Auth::user()->id;
        }
        $vm->nom = $request->nom;
        $vm->adresse_ip = $request->adresse_ip;
        $vm->description = $request->description;
        $vm->cpu = $request->cpu;
        $vm->memoire = $request->memoire;
        $vm->etat = $request->etat;

        $vm->alert = $request->alert ?? 'succès'; // Définit un état par défaut


        
        $vm->save();
        
        return redirect('/ajouter_vm')->with('status', 'vm ajouté avec succès.');
        
    }

    public function modifier_vm_traitement(Request $request){
        $request->validate([
            'user_id' => 'required|string|min:1',
            'nom' => 'required|string|min:2|max:255',
            'adresse_ip' => 'required|string',
            'description' => 'required|string',
            'cpu' => 'required|string',
            'memoire' => 'required|string',
            'etat' => 'required|string',
            'alert' => 'nullable|string',
            
        ]
     );
        $vm = VirtualMachine::find($request->id);
        $user = Auth::user();
        if ($user->role == "Admin") {
            $vm->user_id = $request->user_id;
        } else {
            $vm->user_id = Auth::user()->id;
        }
        $vm->nom = $request->nom;
        $vm->adresse_ip = $request->adresse_ip;
        $vm->description = $request->description;
        $vm->cpu = $request->cpu;
        $vm->memoire = $request->memoire;
        $vm->etat = $request->etat;
        $vm->alert = $request->alert ?? 'succès'; // Définit un état par défaut
        
        $vm->update();
        
        return redirect('/list_vms')->with('status', 'vm modifié avec succès.');
        
    }

    public function supprimer_vm($id)
    {
        $vms= VirtualMachine::find($id);
        $vms->delete();
        return redirect('/list_vms')->with('status', 'vms supprimé avec succès.');

        
    }

}
