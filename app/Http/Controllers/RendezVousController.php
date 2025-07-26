<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rendezvous;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche la liste des rendez-vous du patient connecté
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');

        if ($user->profil === 'MEDECIN') {
            $query = rendezvous::where('idUser', $user->id);
        } elseif ($user->profil === 'PATIENT') {
            $query = rendezvous::where('idUser', $user->id);
        } else {
            $query = rendezvous::query()->whereRaw('1 = 0'); // Empty collection
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->whereHas('medecin.user', function($q2) use ($search) {
                    $q2->where('nom', 'like', '%' . $search . '%')
                       ->orWhere('prenom', 'like', '%' . $search . '%');
                })
                ->orWhere('type-de-soins', 'like', '%' . $search . '%')
                ->orWhere('date-rendez-vous', 'like', '%' . $search . '%');
            });
        }

        $rendezvous = $query->paginate(10)->appends(['search' => $search]);

        return view('pages.rendezvous.index', compact('rendezvous', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     * Affiche le formulaire de création de rendez-vous (médecin)
     */
    public function create()
    {
        // Récupérer la liste des patients (utilisateurs avec profil patient) non masqués
        $patients = User::where('profil', 'PATIENT')->where('is_hidden', false)->orderBy('created_at', 'desc')->get();
        // Récupérer la liste des médecins
        $medecins = \App\Models\medecin::all();
        return view('pages.rendezvous.create', compact('patients', 'medecins'));
    }

    /**
     * Store a newly created resource in storage.
     * Enregistre un nouveau rendez-vous
     */
    public function store(Request $request)
    {
        $request->validate([
            'idUser' => 'required|exists:users,id',
            'idMedecin' => 'required|exists:medecins,id',
            'date-rendez-vous' => 'required|date|after_or_equal:today',
            'heure-rendez-vous' => 'required',
            'type-de-soins' => 'required|string|max:255',
        ]);

        $rendezvous = new rendezvous();
        $rendezvous->idUser = $request->idUser;
        $rendezvous->idMedecin = $request->idMedecin;
        $rendezvous->{'date-rendez-vous'} = $request->input('date-rendez-vous');
        $rendezvous->{'heure-rendez-vous'} = $request->input('heure-rendez-vous');
        $rendezvous->{'type-de-soins'} = $request->input('type-de-soins');
        $rendezvous->status = 'en attente';
        $rendezvous->save();

        return redirect()->back()->with('success', 'Rendez-vous bien enregistré.');
    }

    /**
     * API pour récupérer les statistiques des rendez-vous du patient connecté.
     */
    public function getRendezVousStats()
    {
        $user = Auth::user();
        if ($user->profil !== 'PATIENT') {
            return response()->json(['error' => 'Accès non autorisé'], 403);
        }

        $totalRendezVous = rendezvous::where('idUser', $user->id)->count();

        $rendezVousPasses = rendezvous::where('idUser', $user->id)
            ->whereDate('date-rendez-vous', '<', now()->toDateString())
            ->count();

        $rendezVousDuJour = rendezvous::where('idUser', $user->id)
            ->whereDate('date-rendez-vous', now()->toDateString())
            ->count();

        $rendezVousAVenir = rendezvous::where('idUser', $user->id)
            ->whereDate('date-rendez-vous', '>', now()->toDateString())
            ->count();

        $pourcentagePasses = $totalRendezVous > 0 ? round(($rendezVousPasses / $totalRendezVous) * 100, 2) : 0;
        $pourcentageDuJour = $totalRendezVous > 0 ? round(($rendezVousDuJour / $totalRendezVous) * 100, 2) : 0;
        $pourcentageAVenir = $totalRendezVous > 0 ? round(($rendezVousAVenir / $totalRendezVous) * 100, 2) : 0;

        return response()->json([
            'pourcentagePasses' => $pourcentagePasses,
            'pourcentageDuJour' => $pourcentageDuJour,
            'pourcentageAVenir' => $pourcentageAVenir,
        ]);
    }
}
