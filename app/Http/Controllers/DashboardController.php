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

            // Calcul des pourcentages de rendez-vous pour admin (tous les rendez-vous)
            $totalRendezVous = \App\Models\rendezvous::count();

            $rendezVousPasses = \App\Models\rendezvous::whereDate('date-rendez-vous', '<', now()->toDateString())->count();

            $rendezVousDuJour = \App\Models\rendezvous::whereDate('date-rendez-vous', now()->toDateString())->count();

            $rendezVousAVenir = \App\Models\rendezvous::whereDate('date-rendez-vous', '>', now()->toDateString())->count();

            $pourcentagePasses = $totalRendezVous > 0 ? round(($rendezVousPasses / $totalRendezVous) * 100, 2) : 0;
            $pourcentageDuJour = $totalRendezVous > 0 ? round(($rendezVousDuJour / $totalRendezVous) * 100, 2) : 0;
            $pourcentageAVenir = $totalRendezVous > 0 ? round(($rendezVousAVenir / $totalRendezVous) * 100, 2) : 0;

return view('pages.front-end.admin.dashboardAdmin', compact('consultationsJour', 'facturesTotal', 'revenusMois','totalRecettes', 'derniersUtilisateurs', 'pourcentagePasses', 'pourcentageDuJour', 'pourcentageAVenir'));

        case 'SECRETAIRE':
            $consultations = \App\Models\Consultation::with(['patient', 'rendezvous.medecin'])
                ->whereDate('date', now()->toDateString())
                ->orderBy('heure')
                ->get();
            return view('pages.front-end.Secretaire.DashboardSecretaire', compact('consultations'));

        case 'MEDECIN':
            $patientsTermines = \App\Models\User::where('is_hidden', 1)->count();
            $totalConsultationsDuJour = \App\Models\Consultation::whereDate('date', now()->toDateString())->count();
            $user = Auth::user();

            // Récupérer l'id du medecin lié à l'utilisateur connecté
            $medecin = \App\Models\medecin::where('idUser', $user->id)->first();

            $medecinId = $medecin ? $medecin->id : null;

            // On filtre les rendez-vous sur l'id du medecin
            $totalRendezVousDuJour = $medecinId ? \App\Models\rendezvous::where('idMedecin', $medecinId)
                ->whereRaw("DATE(`date-rendez-vous`) = ?", [now()->toDateString()])
                ->count() : 0;

            $totalRendezVous = $medecinId ? \App\Models\rendezvous::where('idMedecin', $medecinId)->count() : 0;

            $rendezVousPasses = $medecinId ? \App\Models\rendezvous::where('idMedecin', $medecinId)
                ->whereRaw("DATE(`date-rendez-vous`) < ?", [now()->toDateString()])
                ->count() : 0;

            $rendezVousDuJour = $medecinId ? \App\Models\rendezvous::where('idMedecin', $medecinId)
                ->whereRaw("DATE(`date-rendez-vous`) = ?", [now()->toDateString()])
                ->count() : 0;

            $rendezVousAVenir = $medecinId ? \App\Models\rendezvous::where('idMedecin', $medecinId)
                ->whereRaw("DATE(`date-rendez-vous`) > ?", [now()->toDateString()])
                ->count() : 0;

            $pourcentagePasses = $totalRendezVous > 0 ? round(($rendezVousPasses / $totalRendezVous) * 100, 2) : 0;
            $pourcentageDuJour = $totalRendezVous > 0 ? round(($rendezVousDuJour / $totalRendezVous) * 100, 2) : 0;
            $pourcentageAVenir = $totalRendezVous > 0 ? round(($rendezVousAVenir / $totalRendezVous) * 100, 2) : 0;

            // Récupérer le nombre de rendez-vous par jour de la semaine (Lun-Dim) pour le médecin connecté
            $startOfWeek = \Carbon\Carbon::now()->startOfWeek(); // Lundi
            $endOfWeek = \Carbon\Carbon::now()->endOfWeek(); // Dimanche

            $rendezVousParJour = $medecinId ? \App\Models\rendezvous::selectRaw('DAYOFWEEK(`date-rendez-vous`) as jour_semaine, COUNT(*) as total')
                ->where('idMedecin', $medecinId)
                ->whereDate('date-rendez-vous', '>=', $startOfWeek)
                ->whereDate('date-rendez-vous', '<=', $endOfWeek)
                ->groupBy('jour_semaine')
                ->pluck('total', 'jour_semaine')
                ->toArray() : [];

            // Initialiser un tableau avec 7 jours (Lun=2 à Dim=1 selon DAYOFWEEK MySQL)
            $donneesRendezVous = [];
            for ($i = 2; $i <= 7; $i++) {
                $donneesRendezVous[] = $rendezVousParJour[$i] ?? 0;
            }
            // Ajouter Dimanche (1)
            $donneesRendezVous[] = $rendezVousParJour[1] ?? 0;

            return view('pages.front-end.medecin.DashboardMedecin', compact('patientsTermines', 'totalConsultationsDuJour', 'totalRendezVousDuJour', 'pourcentagePasses', 'pourcentageDuJour', 'pourcentageAVenir', 'donneesRendezVous'));

        case 'PATIENT':
            $user = Auth::user();
            $totalRendezVous = \App\Models\rendezvous::where('idUser', $user->id)->count();
            $totalOrdonnances = \App\Models\ordonnance::where('idUser', $user->id)->count();
            $totalConsultations = \App\Models\Consultation::where('idUser', $user->id)->count();

            $rendezVousPasses = \App\Models\rendezvous::where('idUser', $user->id)
                ->whereDate('date-rendez-vous', '<', now()->toDateString())
                ->count();

            $rendezVousDuJour = \App\Models\rendezvous::where('idUser', $user->id)
                ->whereDate('date-rendez-vous', now()->toDateString())
                ->count();

            $rendezVousAVenir = \App\Models\rendezvous::where('idUser', $user->id)
                ->whereDate('date-rendez-vous', '>', now()->toDateString())
                ->count();

            $pourcentagePasses = $totalRendezVous > 0 ? round(($rendezVousPasses / $totalRendezVous) * 100, 2) : 0;
            $pourcentageDuJour = $totalRendezVous > 0 ? round(($rendezVousDuJour / $totalRendezVous) * 100, 2) : 0;
            $pourcentageAVenir = $totalRendezVous > 0 ? round(($rendezVousAVenir / $totalRendezVous) * 100, 2) : 0;

            return view('pages.front-end.patient.DashboardPatient', compact(
                'totalRendezVous',
                'totalOrdonnances',
                'totalConsultations',
                'pourcentagePasses',
                'pourcentageDuJour',
                'pourcentageAVenir'
            ));

        default:
            abort(403, 'Profil utilisateur non reconnu.');
    }
}
}
