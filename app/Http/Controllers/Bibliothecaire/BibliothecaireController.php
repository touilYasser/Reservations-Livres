<?php

namespace App\Http\Controllers\Bibliothecaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BibliothecaireController extends Controller
{
    public function index(){
        return view('Bibliothecaire.dashboard');
    }
}
