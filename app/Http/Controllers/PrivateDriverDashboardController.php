<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typevoiture;
use App\Models\Demande;
use App\Models\Paiement;
use App\Models\Gain;
use App\Notifications\DemandeSoumise;

class PrivateDriverDashboardController extends Controller
{
    //
    ////////////////////////////////////////////////methodes des vues d'acces privee

    //utiliser le middleware auth pour verifier si la personne est authentifiée
    public function __construct(){
        $this->middleware('auth')->except(['searchlocations']);
    }

    


    //********************************************************************************** */
    public function viewnotifications(Request $request)
    {
        //si user connecté
        if (!$request->user()) {
            return redirect()->route('login');
        }
              
        // Récupérer l'utilisateur connecté
        $notifications = $request->user()->notifications;

        
        return view('userprivatepages.viewnotifications', compact('notifications'));
    }

    //******************************************************************** */
      public function viewgains(Request $request){

        // Vérifier si l'utilisateur est connecté
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Récupérer le type d'utilisateur
        $idtypeutilisateur = $request->user()->idtypeutilisateur;

        // Vérifier si le type d'utilisateur est 2 (déménageur)
        if ($idtypeutilisateur == 1) {

             // Récupérer l'utilisateur actuel
            $user = $request->user();

        // Récupérer le montant total des paiements reçus par l'utilisateur
            $totalgains = $user->gains()->sum('gains_en_cours');

           
            // Récupérer les paiements  liées à cet utilisateur avec les champs lieudep et lieudest de demenagement
            $usergains= Gain::where('iduser', $request->user()->id)
        ->with('demande') // Charger la relation typevoiture
        ->get();
           
           // Afficher la vue avec les demandes de déménagement
           return view('userprivatepages.viewgains', compact('usergains', 'totalgains'));
       } else {
           // Rediriger vers une autre page ou afficher un message d'erreur
           return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
       }

        // return view('userprivatepages.viewpayements');

    }


    //************************************************************************** */
    public function viewdemandes(Request $request) {
        // Vérifier si l'utilisateur est connecté
        if (!$request->user()) {
            return redirect()->route('login');
        }
    
        // Récupérer le type d'utilisateur
        $idtypeutilisateur = $request->user()->idtypeutilisateur;
    
        // Vérifier si le type d'utilisateur est 2 (déménageur)
        if ($idtypeutilisateur == 1) {
           
             // Récupérer les demandes de déménagement liées à cet utilisateur avec le libellé du type de voiture
    $driverdemandes = Demande::where('iduser', $request->user()->id)
    ->with('typevoiture') // Charger la relation typevoiture
    ->get();
            
            // Afficher la vue avec les demandes de déménagement
            return view('userprivatepages.viewdemandes', compact('driverdemandes'));
        } else {
            // Rediriger vers une autre page ou afficher un message d'erreur
            return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    }
    

    //************************************************************* */
    



    /////////////////////////////////////////////////methodes des vues d'acces public   

    public function searchlocations(){
        return view('moovspeed.locations');
    }

}
