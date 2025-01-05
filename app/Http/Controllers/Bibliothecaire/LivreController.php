<?php

namespace App\Http\Controllers\Bibliothecaire;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){
        $livres = Livre::paginate(10);
        return view('Bibliothecaire.livres.index', compact('livres'));
    }
    public function create(){
        return view('Bibliothecaire.livres.create');
    }
    public function store(Request $request){
        $livre = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
        ]);
        Livre::create($livre);
        return redirect()->route('bibliothecaire.livre.index');
    }

    public function edit($id){
        $livre = Livre::findOrFail($id);
        return view('Bibliothecaire.livres.edit', compact('livre'));
    }

    public function update(Request $request, $id){
        $livre = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
        ]);
        Livre::findOrFail($id)->update($livre);
        return redirect()->route('bibliothecaire.livre.index');
    }

    public function destroy($id){
        Livre::findOrFail($id)->delete();
        return redirect()->route('bibliothecaire.livre.index');
    }
}
