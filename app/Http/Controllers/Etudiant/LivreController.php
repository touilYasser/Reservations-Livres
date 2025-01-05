<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){
        $livres = Livre::where('status', 'disponible')->paginate(10);
        return view('Etudiant.livres.index', compact('livres'));
    }
}
