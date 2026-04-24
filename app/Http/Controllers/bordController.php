<?php

namespace App\Http\Controllers;
use App\Models\VirtualMachine;
use App\Models\User;
use Illuminate\Http\Request;

class bordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function bord() {
        $totalUser=User::all()->count();
        $totalVm=VirtualMachine::all()->count();
        $totalVmActive = VirtualMachine::where('etat', 'Activer')->count();
        $totalVmInactive = VirtualMachine::where('etat', 'Désactiver')->count();
        return view('bord',compact('totalUser','totalVm','totalVmActive','totalVmInactive'));
    }

}
