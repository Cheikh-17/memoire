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
                return view('pages.front-end.admin.dashboardAdmin');
            case 'SECRETAIRE':
                $consultations = \App\Models\Consultation::with(['patient', 'medecin'])
                    ->whereDate('date', now()->toDateString())
                    ->whereHas('medecin') // S'assurer que la consultation a un médecin lié
                    ->orderBy('heure')
                    ->get();
                return view('pages.front-end.Secretaire.DashboardSecretaire', compact('consultations'));
            case 'MEDECIN':
                return view('pages.front-end.medecin.DashboardMedecin');
            case 'PATIENT':
                return view('pages.front-end.patient.DashboardPatient');
            default:
                abort(403, 'Profil utilisateur non reconnu.');
        }
    }
}
