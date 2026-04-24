<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\vmController;
use App\Http\Controllers\bordController;
Auth::routes();
Route::redirect('/', '/login');

/*Route::get('/', function () {
    return view('layouts.app');
});*/
Route::get('/bord', [bordController::class,'bord']);
//utilisateur
Route::get('/list_utilisateurs', [userController::class,'list_utilisateurs']);
Route::get('/ajouter_utilisateur',[userController::class,'ajouter_utilisateur']);
Route::get('/modifier_utilisateur/{id}', [userController::class,'modifier_utilisateur']);
Route::delete('/supprimer_utilisateur/{id}', [userController::class,'supprimer_utilisateur']);
Route::post('/modifier_utilisateur/traitement/{user}', [userController::class,'modifier_utilisateur_traitement']);
Route::post('/ajouter_utilisateur/traitement', [userController::class,'ajouter_utilisateur_traitement']);

//les machines virtuelles
Route::get('/list_vms', [vmController::class,'list_vms']);
Route::get('/ajouter_vm', [vmController::class,'ajouter_vm']);
Route::get('/modifier_vm/{id}', [vmController::class,'modifier_vm']);
Route::post('/ajouter_vm/traitement', [vmController::class,'ajouter_vm_traitement']);
Route::post('/modifier_vm/traitement', [vmController::class,'modifier_vm_traitement']);
Route::delete('/supprimer_vm/{id}', [vmController::class,'supprimer_vm']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
