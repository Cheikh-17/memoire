<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Affiche le dashboard selon le rôle de l'utilisateur connecté.
     */
public function index()
{
    $user = Auth::user();

    switch ($user->profil) {
        case 'ADMINISTRATEUR':
            $consultationsJour = \App\Models\Consultation::whereDate('date', now()->toDateString())->count();
            $facturesTotal = \App\Models\facture::count();
            $revenusMois = \App\Models\paiement::sum('montant');
            $totalRecettes = \App\Models\paiement::whereMonth('created_at', now()->month)->sum('montant');
            $derniersUtilisateurs = \App\Models\User::orderBy('created_at', 'desc')->limit(5)->get();

return view('pages.front-end.admin.dashboardAdmin', compact('consultationsJour', 'facturesTotal', 'revenusMois','totalRecettes', 'derniersUtilisateurs'));

        case 'SECRETAIRE':
            $consultations = \App\Models\Consultation::with(['patient', 'rendezvous.medecin'])
                ->whereDate('date', now()->toDateString())
                ->orderBy('heure')
                ->get();
            return view('pages.front-end.Secretaire.DashboardSecretaire', compact('consultations'));

        case 'MEDECIN':
            $patientsTermines = \App\Models\User::where('is_hidden', 1)->count();
            $totalConsultationsDuJour = \App\Models\Consultation::whereDate('date', now()->toDateString())->count();
            $totalRendezVousDuJour = \App\Models\rendezvous::whereDate('date-rendez-vous', now()->toDateString())->count();

            return view('pages.front-end.medecin.DashboardMedecin', compact('patientsTermines', 'totalConsultationsDuJour', 'totalRendezVousDuJour'));

        case 'PATIENT':
            $user = Auth::user();
            $totalRendezVous = \App\Models\rendezvous::where('idUser', $user->id)->count();
            $totalOrdonnances = \App\Models\ordonnance::where('idUser', $user->id)->count();
            $totalConsultations = \App\Models\Consultation::where('idUser', $user->id)->count();
            return view('pages.front-end.patient.DashboardPatient', compact('totalRendezVous', 'totalOrdonnances', 'totalConsultations'));

        default:
            abort(403, 'Profil utilisateur non reconnu.');
    }
}
}
