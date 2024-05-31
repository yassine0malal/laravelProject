<?php

use App\Models\Solde;
use App\Models\Formulaire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SoldeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FormulaireController;

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register',[LoginController::class,'registerPost'])->name('register.post');

Route::post('/register/post',[LoginController::class,'loginpost'])->name('login.post');
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/client/homeClient',[ClientController::class,'homeClient'])->name('homeClient'); 

Route::get('/client/logout',[ClientController::class,'logout'])->name('logout');

Route::get('/client/company', [ClientController::class, 'liste_company'])->name('company');
Route::get('/client/request', [ClientController::class, 'liste_request'])->name('request');


Route::get('/client/formulaire',[FormulaireController::class,'formule'])->name('formulaire');
Route::post('/client/formulaire/post',[FormulaireController::class,'formulePost'])->name('formulaire.post');

Route::delete('/client/request/formulair/{formulair}', [ClientController::class, 'drop'])->name('drop.request');

Route::get('/client/request/formulair/{formulair}/edit', [ClientController::class, 'edit'])->name('edit');
Route::put('/client/request/formulair/{formulair}', [ClientController::class, 'update'])->name('update');
Route::get('/solde', [SoldeController::class, 'index'])->name('solde');
Route::get('/client/companysolde', [ClientController::class, 'tablesolde'])->name('tablesolde');

//-------------------------------------------------
Route::get('/admin/homeAdmin',[AdminController::class,'homeAdmin'])->name('homeAdmin');
Route::get('/admin/solde',[AdminController::class,'solde'])->name('solde');
Route::post('/admin/solde/post',[AdminController::class,'soldePost'])->name('solde.post');
Route::get('/admin/company', [AdminController::class, 'liste_solde'])->name('companysolde');
Route::get('/admin/company/{solde}/edit', [AdminController::class, 'edit_solde'])->name('edit.solde');
Route::put('/admin/company/{solde}', [AdminController::class, 'update_solde'])->name('update.solde');
Route::get('/admin/request', [AdminController::class, 'demande'])->name('demande');
Route::get('/admin/logout',[AdminController::class,'logoutadmin'])->name('logoutadmin');
Route::get('/admin/Voirdemmande{id}',[AdminController::class,'Voirdemmande'])->name('Voirdemmande');
Route::patch('/admin/Voirdemmande/formule/{id}',[AdminController::class,'valid'])->name('valid');



Route::get('/client/request/pdf',[pdfController::class, 'pdf'])->name('pdf');
