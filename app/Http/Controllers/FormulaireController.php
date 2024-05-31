<?php

namespace App\Http\Controllers;

use App\Models\Formulair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormulaireController extends Controller
{
    public function formulePost(Request $request){
        if ($request->isMethod('post')) {
            if (auth()->check()) {
                $request->validate([
                    'company' => 'required',
                    'budget' => 'required',
                    'collaborator' => 'required',
                    'destination' => 'required',
                    'description' => 'required',
                ]);
    
                $formulaire = new Formulair();
                $formulaire->company = $request->input('company');
                $formulaire->budget = $request->input('budget');
                $formulaire->collaborator = $request->input('collaborator');
                $formulaire->destination = $request->input('destination');
                $formulaire->date = date("Y-m-d", strtotime($request->input('date')));
                $formulaire->description = $request->input('description');
                $formulaire->profil_id = auth()->user()->id;
                $formulaire->save();
    
                return back()->with('message', 'Success');
            } else {
                return redirect()->route('register');
            }
        }
    }
    
        
    
      
   public function formule(Request $request){
 
    return view('client.formulaire') ;
   }

}
