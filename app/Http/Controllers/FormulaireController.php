<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\Formulair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormulaireController extends Controller
{
    public function formulePost(Request $request, Solde $solde){
        if ($request->isMethod('post')) {
            if (auth()->check()) {
                $request->validate([
                    'company' => 'required',
                    'budget' => 'required|numeric',
                    'collaborator' => 'required',
                    'destination' => 'required',
                    'description' => 'required',
                    'date' => 'required|date',  // Supposant que la date est un champ requis
                ]);
    
                // Récupérez le solde de l'entreprise sélectionnée
                $companySolde = $solde->where('companyName', $request->input('company'))->value('solde');
    
                if ($request->input('budget') <= $companySolde) {
                    $formulaire = new Formulair();
                    $formulaire->company = $request->input('company');
                    $formulaire->budget = $request->input('budget');
                    $formulaire->collaborator = $request->input('collaborator');
                    $formulaire->destination = $request->input('destination');
                    $formulaire->date = date("Y-m-d", strtotime($request->input('date')));
                    $formulaire->description = $request->input('description');
                    $formulaire->profil_id = auth()->user()->id;
                    $formulaire->save();
    
                    return back()->with('message', 'Succès');
                } else {
                    return back()->withErrors(['budget' => 'Le budget doit être inférieur au solde disponible.']);
                }
            } else {
                return redirect()->route('register');
            }
        }
    }
    
        
    
      
   public function formule(Request $request){
 
    return view('client.formulaire') ;
   }

}
