<?php

use App\Http\Controllers\FactureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\medecinController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\devisController;
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

        /*
        // Dashboards protégés par middleware auth et profil
        Route::middleware(['profil:ADMINISTRATEUR'])->group(function () {
            Route::get('/dashboard-admin', function () {
                return view('pages.front-end.admin.dashboardAdmin');
            })->name('dashboard-admin');
        });

        Route::middleware(['profil:SECRETAIRE'])->group(function () {
            Route::get('/dashboard-secretaire', function () {
                return view('pages.front-end.Secretaire.DashboardSecretaire');
            })->name('dashboard-secretaire');
        });

        Route::middleware(['profil:MEDECIN'])->group(function () {
            Route::get('/dashboard-medecin', function () {
                return view('pages.front-end.medecin.DashboardMedecin');
            })->name('dashboard-medecin');
        });

        Route::middleware(['profil:PATIENT'])->group(function () {
            Route::get('/dashboard-patient', function () {
                return view('pages.front-end.patient.DashboardPatient');
            })->name('dashboard-patient');
        });
        */
    });

// Route POST pour traiter la connexion
Route::post('/connexion', [UserController::class, 'login'])->name('login.post');

// Route GET pour afficher la page de connexion (non protégée)
Route::get('/connexion', function () {
    return view('pages.front-end.auth.connexion');
})->name('login');

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

/*
// Dashboard administrateur
Route::get('/dashboard-admin', function () {
    return view('pages.front-end.admin.dashboardAdmin');
})->name('dashboard-admin');

// Dashboard secrétaire
Route::get('/dashboard-secretaire', function () {
    return view('pages.front-end.Secretaire.DashboardSecretaire');
})->name('dashboard-secretaire');
*/

// Route pour afficher la liste des secrétaires
Route::get('/secretaire', [SecretaireController::class, 'dashboard'])->name('secretaire.index');

Route::get('/secretaire/{id}', [SecretaireController::class, 'show'])->name('secretaire.show');
Route::get('/secretaire/{id}/edit', [SecretaireController::class, 'edit'])->name('secretaire.edit');
Route::put('/secretaire/{id}', [SecretaireController::class, 'update'])->name('secretaire.update');
Route::delete('/secretaire/{id}', [SecretaireController::class, 'destroy'])->name('secretaire.destroy');


// // Dashboard médecin
// Route::get('/dashboard-medecin', function () {
//     return view('pages.front-end.medecin.DashboardMedecin');
// })->name('dashboard-medecin');

/*
// Dashboard médecin
Route::get('/dashboard-medecin', function () {
    return view('pages.front-end.medecin.DashboardMedecin');
})->name('dashboard-medecin');
*/

// Route pour afficher la liste des médecins
Route::get('/medecin', [medecinController::class, 'index'])->name('medecin.index');

Route::get('/medecin/{id}', [medecinController::class, 'show'])->name('medecin.show');
Route::get('/medecin/{id}/edit', [medecinController::class, 'edit'])->name('medecin.edit');
Route::put('/medecin/{id}', [medecinController::class, 'update'])->name('medecin.update');
Route::delete('/medecin/{id}', [medecinController::class, 'destroy'])->name('medecin.destroy');

// // Dashboard patient
// Route::get('/dashboard-patient', function () {
//     return view('pages.front-end.patient.DashboardPatient');
// })->name('dashboard-patient');

/*
// Dashboard patient
Route::get('/dashboard-patient', function () {
    return view('pages.front-end.patient.DashboardPatient');
})->name('dashboard-patient');
*/

// Formulaire de création de médecin (admin)
Route::get('/create' , function () {
    return view('pages.front-end.admin.create');
})->name('create');




//route secretaire pour le patient
Route::get('/formPatient', [PatientController::class, 'create'])->name('formPatient');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::post('/devis', [devisController::class, 'store'])->middleware('auth')->name('devis.store');
//Route::get('/factures', [FactureControllerr::class, 'index'])->name('factures.index');
Route::resource('devis', App\Http\Controllers\devisController::class);
Route::get('/create' , function () {
    return view('pages.front-end.admin.medecin.createMedecin');
})->name('create');
Route::get('/secretaire/dashboard', [SecretaireController::class, 'dashboard'])->name('secretaire.dashboard');




//Formulaire de création de secrétaire (admin)


// Formulaire de création de patient (secrétaire)
Route::get('/formPatient' , function () {
    return view('pages.front-end.patient.formPatient');
})->name('formPatient');

// Route POST pour enregistrer un patient via le formulaire
Route::post('/formPatient', [patientController::class, 'store'])->name('formPatient.store');

Route::get('/form' , function () {
    return view('pages.front-end.admin.form');
})->name('form');
// Route pour enregistrer un secrétaire (POST)
Route::post('/form', [UserController::class, 'store'])->name('form');

Route::get('/patients', [patientController::class, 'index'])->name('patients.index');

Route::get('/patients/{id}', [patientController::class, 'show'])->name('patients.show');
Route::get('/patients/{id}/edit', [patientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [patientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [patientController::class, 'destroy'])->name('patients.destroy');
