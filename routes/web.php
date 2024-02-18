<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PrivateuserdashboardpagesController;
use App\Http\Controllers\PrivateAdminDashboardController;
use App\Http\Controllers\PrivateDriverDashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//*************ROUTES DE L CACCUEIL**************************************** */

//route accueil
Route::get('/', [MainController::class, 'index'])->name('index');

//*************ROUTES  PAGES D ACCES PUBLICS DU USER CONNECTER(chauffeur+demenageur)************************** */



//route  d'accès public  a la page des locations
Route::get('/locations', [PrivateuserdashboardpagesController::class, 'searchlocations'])->name('locations');



//*************ROUTES POUR LES PAGES D ACCES PRIVEES DU USER CONNECTER***************************** */


//ROUTES LIEES AUX VUES PRIVEES DU USER DE TYPE 2 == DEMENAGEUR  CONNECTER

//route affichant les infos profils de l'utilisateur et permettant la suppression
Route::get('/profiluser', [PrivateuserdashboardpagesController::class, 'profiluser'])->name('profiluser');
//route affichant le form de creation d'une demande en get
Route::get('/createdemande', [PrivateuserdashboardpagesController::class, 'createdemande'])->name('createdemande');
//route d'enregistrement d'une demande
Route::post('/storedemande', [PrivateuserdashboardpagesController::class, 'storedemande'])->name('storedemande');
//route pour voir les notifs
Route::get('/viewnotifications', [PrivateuserdashboardpagesController::class, 'viewnotifications'])->name('viewnotifications');
//route pour voir les demandes de demenagement effectues
Route::get('/viewdemandes', [PrivateuserdashboardpagesController::class, 'viewdemandes'])->name('viewdemandes');
//route pour voir les paiements
Route::get('/viewpayements', [PrivateuserdashboardpagesController::class, 'viewpayements'])->name('viewpayements');


Route::get('/viewgains', [PrivateuserdashboardpagesController::class, 'viewgains'])->name('viewgains');


//*************ROUTES POUR LES PAGES D ACCES PRIVEES DU CHAUFFEUR ***************************** */

//ROUTES LIEES AUX VUES PRIVEES DU USER DE TYPE 1 == CHAUFFEUR  CONNECTER
// Route::get('/profiluser', [PrivateDriverDashboardController::class, 'profiluser'])->name('profiluser');
// //route pour voir les notifs
// Route::get('/viewnotifications', [PrivateDriverDashboardController::class, 'viewnotifications'])->name('viewnotifications');
// //route pour voir les demandes de demenagement effectues
// Route::get('/viewdemandes', [PrivateDriverDashboardController::class, 'viewdemandes'])->name('viewdemandes');
// //route pour voir les paiements
// Route::get('/viewgains', [PrivateDriverDashboardController::class, 'viewgains'])->name('viewgains');

//*************ROUTES POUR LES PAGES D ACCES PRIVEES DE L ADMIN ***************************** */

//ROUTES LIEES AUX VUES PRIVEES DU USER DE TYPE 3 == ADMIN  CONNECTER

//route qui affiche la vue de la page d'accueil admin
Route::get('/adminhome', [PrivateAdminDashboardController::class, 'adminhome'])->name('adminhome');
Route::get('/admins', [PrivateAdminDashboardController::class, 'admins'])->name('admins');
Route::get('/avis', [PrivateAdminDashboardController::class, 'avis'])->name('avis');
Route::get('/chauffeurs', [PrivateAdminDashboardController::class, 'chauffeurs'])->name('chauffeurs');
Route::get('/demandes', [PrivateAdminDashboardController::class, 'demandes'])->name('demandes');
Route::get('/demenageurs', [PrivateAdminDashboardController::class, 'demenageurs'])->name('demenageurs');
Route::get('/gains', [PrivateAdminDashboardController::class, 'gains'])->name('gains');
Route::get('/notifications', [PrivateAdminDashboardController::class, 'notifications'])->name('notifications');
Route::post('/envoyer/notification', [PrivateAdminDashboardController::class, 'envoyerNotification'])->name('envoyernotification');
Route::get('/paiements', [PrivateAdminDashboardController::class, 'paiements'])->name('paiements');









//Route::get('/profiluser', [PrivateAdminDashboardController::class, 'profiluser'])->name('profiluser');
// //route affichant le form de creation d'une demande en get
// Route::get('/createdemande', [PrivateAdminDashboardController::class, 'createdemande'])->name('createdemande');
// //route d'enregistrement d'une demande
// Route::post('/storedemande', [PrivateAdminDashboardController::class, 'storedemande'])->name('storedemande');
// //route pour voir les notifs
// Route::get('/viewnotifications', [PrivateAdminDashboardController::class, 'viewnotifications'])->name('viewnotifications');
// //route pour voir les demandes de demenagement effectues
// Route::get('/viewdemandes', [PrivateAdminDashboardController::class, 'viewdemandes'])->name('viewdemandes');
// //route pour voir les paiements
// Route::get('/viewpayements', [PrivateAdminDashboardController::class, 'viewpayements'])->name('viewpayements');




//*************ROUTES D HAUTENTIFICATION **************************************** */


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
