<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\Company;
use App\Models\Formulair;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class ClientController extends Controller
{
    public function homeClient(profile $profile){
        $user=auth()->user();
        $profile=profile::where('id',$user->id)->first();
        return view('client.homeClient',compact('profile'));
} 
public function company(){
    return view('client.company');
} 
public function liste_company() {
        
    $companies = Company::all();
    
    return view('client.company',compact('companies'));
}
public function liste_request() {
    if (auth()->check()) {
        $userId = auth()->id();
    
        $formulaires = Formulair::where('profil_id', $userId)->where('is_validated', false)->get();

        return view('client.request', compact('formulaires'));
    } else {
        return redirect()->route('register');
    }
}

public function drop(Formulair $formulair){
    $formulair->delete();
    return back()->with('message', 'Formulaire supprimer avec succès.');
}
public function edit(Formulair $formulair){
    return view('client.edit', compact('formulair'));
}

public function update(Request $request, Formulair $formulair) {
    if (auth()->check()) {
        $request->validate([
            'company' => 'required',
            'budget' => 'required',
            'collaborator' => 'required',
            'destination' => 'required',
            'description' => 'required',
        ]);

        $formulair->company = $request->input('company');
        $formulair->budget = $request->input('budget');
        $formulair->collaborator = $request->input('collaborator');
        $formulair->destination = $request->input('destination');
        $formulair->date = date("Y-m-d", strtotime($request->input('date')));
        $formulair->description = $request->input('description');

        // Sauvegarde
        $formulair->save();
        return back()->with('message', 'Formulaire mis à jour avec succès.');
    } else {
        return redirect()->route('register');
    }
}


public function logout()
{
    session()->flush();
    Auth::logout();
    // Redirect to the registration page (if that is your intended behavior)
    return redirect()->route('register');
}
public function tablesolde(Request $request){
    $solde = Solde::all();
    return view('client.companysolde',compact('solde')) ;
    }

}
