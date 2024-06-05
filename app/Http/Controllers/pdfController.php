<?php

namespace App\Http\Controllers;

use App\Models\pc;
use App\Models\Profile;
use App\Models\Formulair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Importer la façade de DomPDF

class pdfController extends Controller
{
    public function pdf($id)
{
    $user = Auth::user();
    $forme = Formulair::where('profil_id', $user->id)->where('id', $id)->where('is_validated', true)->firstOrFail();
    $profile = Profile::findOrFail($user->id);

    $pdf = PDF::loadView('pdf.pdf', compact('forme', 'profile'));

    $forme->is_download = true;
    $forme->save();

    return $pdf->download('Demande.pdf');
}
}