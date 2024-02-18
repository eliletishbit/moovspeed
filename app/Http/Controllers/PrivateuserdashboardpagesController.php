<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Typevoiture;
use App\Models\Demande;
use App\Models\Paiement;
use App\Models\Gain;

use App\Notifications\DemandeSoumise;



class PrivateuserdashboardpagesController extends Controller
{
    ////////////////////////////////////////////////methodes des vues d'acces privee

    //utiliser le middleware auth pour verifier si la personne est authentifiée
    public function __construct(){
        $this->middleware('auth')->except(['searchlocations']);
    }


    //********************************************************************************** */

    // Méthode pour afficher la page des gains
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
           $usergains = Gain::where('iduser', $request->user()->id)
       ->with('demande') // Charger la relation typevoiture
       ->get();
          
          // Afficher la vue avec les demandes de déménagement
          return view('userprivatepages.viewgains', compact('usergains', 'totalgains'));
      } else {
          // Rediriger vers une autre page ou afficher un message d'erreur
          return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
      }


   }
    

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
      public function viewpayements(Request $request){

        // Vérifier si l'utilisateur est connecté
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Récupérer le type d'utilisateur
        $idtypeutilisateur = $request->user()->idtypeutilisateur;

        // Vérifier si le type d'utilisateur est 2 (déménageur)
        if ($idtypeutilisateur == 2) {

             // Récupérer l'utilisateur actuel
            $user = $request->user();

        // Récupérer le montant total des paiements reçus par l'utilisateur
            $totalpaiement = $user->paiements()->sum('paiement_en_attente');

           
            // Récupérer les paiements  liées à cet utilisateur avec les champs lieudep et lieudest de demenagement
            $userpaiements = Paiement::where('iduser', $request->user()->id)
        ->with('demande') // Charger la relation typevoiture
        ->get();
           
           // Afficher la vue avec les demandes de déménagement
           return view('userprivatepages.viewpayements', compact('userpaiements', 'totalpaiement'));
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
        if ($idtypeutilisateur == 2) {
           
             // Récupérer les demandes de déménagement liées à cet utilisateur avec le libellé du type de voiture
    $userdemandes = Demande::where('iduser', $request->user()->id)
    ->with('typevoiture') // Charger la relation typevoiture
    ->get();
            
            // Afficher la vue avec les demandes de déménagement
            return view('userprivatepages.viewdemandes', compact('userdemandes'));
        } else {
            // Rediriger vers une autre page ou afficher un message d'erreur
            return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    }
    

    //************************************************************* */
    public function createdemande(){

        //injecter les types de voiture
        $typevoitures = Typevoiture::all();
        $status = 0;
        return  view('userprivatepages.createdemandes', compact('typevoitures','status'));
        
    }

    public function storedemande(Request $request){

        $request->validate([
            'lieudep' => ['required', 'string', 'max:255'],
            'lieudest' => ['required', 'string', 'max:255'],
            'dateHeureDem' => ['required', 'string', 'max:255'],
            'idtypevoiture' => ['required', 'numeric'],
            'status'=>['required', 'boolean'],
            'iduser'=>['required', 'numeric'],

            
        ]);

        $demande = Demande::create([
            'lieudep' => $request->lieudep,
            'lieudest' => $request->lieudest,
            'dateHeureDem' => $request->dateHeureDem,
            'idtypevoiture' => $request->idtypevoiture,
            'status'=>$request->status,
            'iduser'=>$request->iduser
            
        ]);     
        
        $user = $request->user();
       
        
        // Générer la notification
    $user->notify(new DemandeSoumise($user));

        //recuperer les demandes de l'utilisateur et injcter dans la vue
        return redirect(route('viewnotifications'))->with('Felicitations', 'Demande créer avec succès');




    }



    /////////////////////////////////////////////////methodes des vues d'acces public   

    public function searchlocations(){
        return view('moovspeed.locations');
    }

    


}
