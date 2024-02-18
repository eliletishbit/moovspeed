<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Note;
use App\Models\Paiement;
use App\Models\Demande;
use App\Models\Gain;
use App\Models\Notification;
use App\Notifications\AnalyseDemande;


class PrivateAdminDashboardController extends Controller
{
    //fonction pour notifier les utilisateurs 1 et 2
    public function Notifier(Request $request){

        //analyse demande : envoyé au demenageur pour lui dire que sa demande est en etude

        // Vérifier si l'utilisateur connecté est un ademenageur
        // if($request->user()->idtypeutilisateur === 2){
        //     // Récupérer tous les administrateurs
        //     $Notifications = Notification::where('user_id', $request->user()->id)->get();
        //     return view('adminprivatepages.admins', compact('admins'));
        // }
        // demande attribuee : envoyé au chauffeur par l'admin lorqu'une demande est dispo


        //validation demande : envoyer au user quand la dmande a été totalement validé


    }

   
    // Méthode pour afficher la page d'accueil de l'administration
    public function adminhome(){
        return view('adminprivatepages.adminhome');
    }

    // Méthode pour afficher la liste des administrateurs
    public function admins(Request $request){
        // Vérifier si l'utilisateur connecté est un administrateur
        if($request->user()->idtypeutilisateur === 3){
            // Récupérer tous les administrateurs
            $admins = User::where('idtypeutilisateur', 3)->get();
            return view('adminprivatepages.admins', compact('admins'));
        } else {
            // Rediriger l'utilisateur vers une page d'erreur ou une autre page appropriée
            return redirect()->route('adminhome')->with('error', 'Accès non autorisé.');
        }
    }

    // Méthode pour afficher la page des avis
    public function avis(){

         // Récupérer tous les avis de la base de données avec les utilisateurs associés
        $reviews = Note::with('demande.user')->get();
        // Passer les avis à la vue
        return view('adminprivatepages.avis', compact('reviews'));
      
    }

    
public function chauffeurs(Request $request)
{
    // Vérifier si l'utilisateur est connecté
    if(!$request->user()) {
        // Rediriger l'utilisateur vers la page de connexion
        return redirect()->route('login');
    }

    // Récupérer la liste des chauffeurs (utilisateurs de type 1)
    $chauffeurs = User::where('idtypeutilisateur', 1)->get();

    // Passer les chauffeurs à la vue
    return view('adminprivatepages.chauffeurs', compact('chauffeurs'));
}


    // Méthode pour afficher la page des demandes
    public function demandes()
    {
        // Récupérer les déménageurs (utilisateurs de type 2)
        $demenageurs = User::where('idtypeutilisateur', 2)->get();

        // Fusionner toutes les demandes de déménagement dans une seule collection
        $demandes = collect();
        foreach ($demenageurs as $demenageur) {
            $demandes = $demandes->merge($demenageur->demandes);
        }

        // Passer les demandes à la vue
        return view('adminprivatepages.demandes', compact('demandes'));
    }

    // Méthode pour afficher la page des déménageurs
    public function demenageurs(Request $request){
        // Vérifier si l'utilisateur est connecté
        if(!$request->user()) {
            // Rediriger l'utilisateur vers la page de connexion
            return redirect()->route('login');
        }

        // Récupérer la liste des déménageurs (utilisateurs de type 2)
        $movers = User::where('idtypeutilisateur', 2)->get();

        // Passer les chauffeurs à la vue
        return view('adminprivatepages.demenageurs', compact('movers'));
           
    }

   
    public function gains(Request $request){

        // Vérifier si l'utilisateur est connecté
        if (!$request->user()) {
           return redirect()->route('login');
       }

              
       // Récupérer la liste des déménageurs (utilisateurs de type 2)
       $earnings = Gain::all();

            

       return view('adminprivatepages.gains', compact('earnings'));
   }

    // Méthode pour afficher la page des paiements
    public function paiements(Request $request){

        // Vérifier si l'utilisateur est connecté
        if (!$request->user()) {
            return redirect()->route('login');
        }

               
        // Récupérer la liste des déménageurs (utilisateurs de type 2)
        $payments = Paiement::all();
        
       
        // Passer les chauffeurs à la vue
        return view('adminprivatepages.paiements', compact('payments'));
    }


     

    // Méthode pour afficher la page des notifications
    public function notifications(){

       // Récupérer toutes les notifications de type "DemandeSoumise"
    $notifications = Notification::where('type', 'App\Notifications\DemandeSoumise')->get();
    
    // Passer les notifications à la vue
    return view('adminprivatepages.notifications', compact('notifications'));
    }

    /////NOTIFICATION ANALYSE DEMANDE
    public function envoyerNotificationAnalyseDemande()
    {
        // Récupérer les demandes en attente
        $demandesEnAttente = Demande::where('status', 0)->get();

        // Parcourir les demandes en attente et envoyer la notification à chaque utilisateur
        foreach ($demandesEnAttente as $demande) {
            $user = User::find($demande->iduser); // Remplacez id_utilisateur par la colonne correspondant à l'ID de l'utilisateur dans votre table de demandes
            if ($user) {
                $user->notify(new AnalyseDemande($demande));
            }
        }

        return "Notifications d'analyse des demandes envoyées avec succès";
    }

    //function d'envoi de notifs a l'utilisateur

    public function envoyerNotification(Request $request)
{
    $demande = Demande::findOrFail($request->demand_id);
    $user = User::findOrFail($demande->id_utilisateur);

    if ($request->notification_type === 'AnalyseDemande') {
        $user->notify(new AnalyseDemande($demande));
    } elseif ($request->notification_type === 'ValidationDemande') {
        $user->notify(new ValidationDemande($demande));
    }

    return redirect()->back()->with('success', 'Notification envoyée avec succès');
}

}
