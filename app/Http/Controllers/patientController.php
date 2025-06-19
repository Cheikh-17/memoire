<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // Import pour la génération PDF
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function create()
    {
        // Affiche le formulaire de création de patient
        return view('pages.front-end.patient.create');
    }

    public function index()
    {
        $patients = User::where('profil', 'patient')->get();
        return view('pages.front-end.patient.index', compact('patients'));
    }

    public function show($id)
    {
        $patient = User::where('profil', 'patient')->findOrFail($id);
        return view('pages.front-end.patient.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = User::where('profil', 'patient')->findOrFail($id);
        return view('pages.front-end.patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = User::where('profil', 'patient')->findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $patient = User::where('profil', 'patient')->findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Création du patient dans la table users
        \App\Models\User::create([
            'name' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            //'date_naissance' => $validated['date_naissance'],
           // 'sexe' => $validated['sexe'],
            'password' => bcrypt($validated['password']),
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('patients.create')->with('success', 'Patient créé avec succès.');
    }

    // Méthode pour afficher la fiche médicale
    public function ficheMedicale()
    {
        $user = Auth::user();
        $consultations = $user->consultations()->with('traitements')->get();

        return view('pages.fiche.patient.fiche-medicale', compact('user', 'consultations'));
    }

    // Méthode pour générer et télécharger la fiche médicale en PDF
    public function ficheMedicalePdf()
    {
        $user = Auth::user();
        $consultations = $user->consultations()->with('traitements')->get();

        $pdf = Pdf::loadView('pages.fiche.patient.fiche-medicale-pdf', compact('user', 'consultations'));

        return $pdf->download('fiche-medicale.pdf');
    }
}