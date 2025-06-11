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
    public function index()
    {
        $user = Auth::user();
        if ($user->profil === 'MEDECIN') {
            // Récupérer les rendezvous où l'idUser correspond à l'id du médecin connecté
            $rendezvous = rendezvous::where('idUser', $user->id)->get();
        } elseif ($user->profil === 'PATIENT') {
            $rendezvous = rendezvous::where('idUser', $user->id)->get();
        } else {
            $rendezvous = collect();
        }
        return view('pages.rendezvous.index', compact('rendezvous'));
    }

    /**
     * Show the form for creating a new resource.
     * Affiche le formulaire de création de rendez-vous (médecin)
     */
    public function create()
    {
        // Récupérer la liste des patients (utilisateurs avec profil patient)
        $patients = User::where('profil', 'PATIENT')->get();
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
            'date-rendez-vous' => 'required|date',
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
}
