<?php

use App\Http\Controllers\FactureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\medecinController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});





// Page d'exemple "app"
Route::get('/hom', function () {
    return view('app');
});

// Page d'exemple "app1"
Route::get('/ho', function () {
    return view('app1');
});

// Page d'accueil principale
Route::get('/home', function () {
    return view('pages.front-end.Accueil.home');
})->name('home');

// Page de connexion admin
Route::get('/loginAdmin', function () {
    return view('pages.front-end.admin.loginAdmin');
})->name('loginAdmin');

use App\Http\Controllers\PasswordResetController;

Route::get('/passeForget', [PasswordResetController::class, 'showForgetPasswordForm'])->name('passeForget');
Route::post('/passeForget', [PasswordResetController::class, 'submitForgetPasswordForm'])->name('passeForget.post');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// Groupe de routes protégées par le middleware 'auth'
    Route::middleware(['auth'])->group(function () {
        // Déconnexion
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

        // Route unique dashboard
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

        // Routes pour modification profil utilisateur connecté
        Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

        // Routes resource pour rendez-vous
        Route::resource('rendezvous', App\Http\Controllers\RendezVousController::class);

        // Routes pour changement de mot de passe utilisateur connecté
        Route::get('/password/change', [UserController::class, 'changePasswordForm'])->name('password.change');
        Route::post('/password/update', [UserController::class, 'updatePassword'])->name('password.update');
    });

// Route POST pour traiter la connexion
Route::post('/connexion', [UserController::class, 'login'])->name('login.post');

// Route GET pour afficher la page de connexion (non protégée)
Route::get('/connexion', function () {
    return view('pages.front-end.auth.connexion');
})->name('login');

// Routes pour consultations, traitements et ordonnances
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\traitementController;
use App\Http\Controllers\ordonnanceController;

Route::middleware(['auth'])->group(function () {
    Route::resource('consultations', ConsultationController::class)->only(['index', 'show']);
    Route::get('consultations/{id}/download-ordonnance', [ConsultationController::class, 'downloadOrdonnance'])->name('consultations.downloadOrdonnance');

    Route::resource('traitements', traitementController::class)->only(['index', 'show', 'destroy']);
    Route::resource('ordonnances', ordonnanceController::class)->only(['index', 'show', 'destroy']);

    // Routes pour le médecin
    Route::prefix('medecin')->name('medecin.')->group(function () {
        // Nouvelle route pour la liste des consultations (vue liste.blade.php)
        Route::get('consultations/liste', [ConsultationController::class, 'indexMedecin'])->name('consultations.liste');

        Route::resource('consultations', ConsultationController::class)->except(['destroy']);
         
        Route::resource('traitements', traitementController::class)->except(['destroy']);
        Route::resource('ordonnances', ordonnanceController::class)->except(['destroy']);

         

        // Route API pour récupérer les consultations d'un patient
        Route::get('api/patients/{patientId}/consultations', [ConsultationController::class, 'getConsultationsByPatient']);
    });

    // Routes pour le patient
    Route::prefix('patient')->name('patient.')->group(function () {
        Route::resource('ordonnances', ordonnanceController::class)->only(['index', 'show', 'destroy']);

    });
});

Route::get('/reset', function () {
    return view('pages.front-end.Accueil.reset-password');
})->name('reset');

// Page de contact
Route::get('/contact', function () {
    return view('pages.front-end.Accueil.contact');
})->name('contacter');

// Page des prestations/services
Route::get('/prestation', function () {
    return view('pages.front-end.Accueil.prestation');
})->name('service');

// Page "à propos"
Route::get('/propos', function () {
    return view('pages.front-end.Accueil.propos');
})->name('propos');


 

// Route pour afficher la liste des secrétaires
Route::get('/secretaire', [SecretaireController::class, 'index'])->name('secretaire.index');

Route::get('/secretaire/{id}', [SecretaireController::class, 'show'])->name('secretaire.show');
Route::get('/secretaire/{id}/edit', [SecretaireController::class, 'edit'])->name('secretaire.edit');
Route::put('/secretaire/{id}', [SecretaireController::class, 'update'])->name('secretaire.update');
Route::delete('/secretaire/{id}', [SecretaireController::class, 'destroy'])->name('secretaire.destroy');


 

// Route pour afficher la liste des médecins
Route::get('/medecin', [medecinController::class, 'index'])->name('medecin.index');

Route::get('/medecin/{id}', [medecinController::class, 'show'])->name('medecin.show');
Route::get('/medecin/{id}/edit', [medecinController::class, 'edit'])->name('medecin.edit');
Route::put('/medecin/{id}', [medecinController::class, 'update'])->name('medecin.update');
Route::delete('/medecin/{id}', [medecinController::class, 'destroy'])->name('medecin.destroy');

 

// Formulaire de création de médecin (admin)
Route::get('/create' , function () {
    return view('pages.front-end.admin.create');
})->name('create');




//route secretaire pour le patient
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
//Route::get('/factures', [FactureControllerr::class, 'index'])->name('factures.index');
//Route::get('/devis/create', [devisController::class, 'create'])->name('devis.create');
Route::resource('devis', App\Http\Controllers\devisController::class);
Route::get('/create' , function () {
    return view('pages.front-end.admin.medecin.createMedecin');
})->name('create');




//Formulaire de création de secrétaire (admin)


// Formulaire de création de patient (secrétaire)
Route::get('/formPatient' , function () {
    return view('pages.front-end.patient.formPatient');
})->name('formPatient');

// Route POST pour enregistrer un patient via le formulaire
Route::post('/formPatient', [patientController::class, 'store'])->name('formPatient.store');

Route::get('/form' , function () {
    return view('pages.front-end.admin.form');
})->name('form.get');
// Route pour enregistrer un secrétaire (POST)
Route::post('/form', [UserController::class, 'store'])->name('form');

Route::get('/patients', [patientController::class, 'index'])->name('patients.index');

Route::get('/patients/{id}', [patientController::class, 'show'])->name('patients.show');
Route::get('/patients/{id}/edit', [patientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [patientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [patientController::class, 'destroy'])->name('patients.destroy');
// routr pour affichafge mailWe
Route::get('/mail', [App\Http\Controllers\MailController::class, 'sendMail'])->name('mail.send');

Route::middleware(['auth'])->group(function () {
    Route::get('fiche-medicale', [App\Http\Controllers\PatientController::class, 'ficheMedicale'])->name('fiche-medicale');
    Route::get('fiche-medicale/pdf', [App\Http\Controllers\PatientController::class, 'ficheMedicalePdf'])->name('fiche-medicale.pdf');
});
