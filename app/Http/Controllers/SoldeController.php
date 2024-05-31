<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use Illuminate\Http\Request;

class SoldeController extends Controller
{
    public function index()
    {
        $soldes = Solde::all();
        return view('layout.solde', compact('soldes'));
    }
}
