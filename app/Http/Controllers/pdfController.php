<?php

namespace App\Http\Controllers;

use App\Models\Formulair;
use App\Models\pc;
use App\Models\Profile;
use Barryvdh\DomPDF\Facade\Pdf; // Importer la façade de DomPDF
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function pdf()
    {
        $user = auth()->user();
        $forme= Formulair::where('profil_id', $user->id)->where('is_validated', true)->first();
        $profile = Profile::where('id', $user->id)->first();
      
        $pdf = PDF::loadView('pdf.pdf', compact('forme', 'profile')); // Utiliser la méthode loadView de la façade de DomPDF

        return $pdf->download('Demande.pdf');
    }
}