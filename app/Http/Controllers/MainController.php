<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bienimmobilier;

//controlleur gestion accueil
class MainController extends Controller
{
    //description des methodes du controleur principal
    public function index(){
        // recupererons les biens immos et injectons sur le home
       $biensimmos = Bienimmobilier::take(4)->get();
        return view('moovspeed.index', compact('biensimmos'));
    }
}
