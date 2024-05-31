<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\profile;
use App\Mail\gmailvalid;
use App\Models\Formulair;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function homeAdmin(){
       return view('admin.homeAdmin');
}
public function soldePost(Request $request){
    if (auth()->check()) {
        $request->validate([
            'companyName' => 'required',
            'solde' => 'required',
        ]);


    if ($request->isMethod('post')) {
        if (auth()->check()) {
        $Solde = new Solde(); 
        $request->validate([
            'companyName' => 'unique:Soldes',
      ]);
        $Solde->companyName = $request->input('companyName');
        $Solde->solde = $request->input('solde');
       
        $Solde->save();
        return back()->with('message','Success');
    } else {
       
        return redirect()->route('register');
    }
    
}
}
    }
    

  
public function solde(Request $request){


return view('admin.solde') ;
}
public function liste_solde(Request $request){
    
    $solde = Solde::all();
    return view('admin.companysolde',compact('solde')) ;
    }
    public function edit_solde(Solde $solde){

        return view('admin.edit',compact('solde')) ;
        }
public function update_solde(Request $request , Solde $Solde){
    if (auth()->check()) {
        $request->validate([
          
            'solde' => 'required',
        ]);




    $currentSolde = $Solde->solde;

    $newSoldeValue = $request->input('solde');
    $Solde->solde = $currentSolde + $newSoldeValue;
   
    $Solde->save();
    return back()->with('message','Success');
}
}
public function demande(Request $request){
    
    $demande = profile::all();
    return view('admin.demande',compact('demande')) ;
    }
    public function logoutadmin()
{
    session()->flush();
    Auth::logout();
    // Redirect to the registration page (if that is your intended behavior)
    return redirect()->route('register');
}
public function Voirdemmande($id){
    $profile=profile::find($id);
    
    $formule=Formulair::where('profil_id',$id)->where('is_validated',false)->get();
    return view ('admin.Voirdemmande',compact('profile','formule'));
}
public function valid($id, Solde $Solde){
  
$forme=Formulair::findorfail($id);
$forme->is_validated = true;
$forme->save();
$Solde->solde = $Solde->solde - $forme->budget;

$profile = Profile::find($forme->profil_id);

Mail::to($profile->email)->send(new gmailvalid($profile));

return back()->with('message','Demmande Valid');
}
}
