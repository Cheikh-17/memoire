<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs avec le profil PATIENT
        $patients = User::where('profil', 'PATIENT')->get();

        // Retourner la vue avec la liste des patients
        return view('pages.front-end.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|numeric',
            'profil' => 'required|string|in:PATIENT',
            'password' => 'required|string|min:6',
        ]);

        // Création du nouvel utilisateur patient
        $user = new User();
        $user->nom = $validatedData['nom'];
        $user->prenom = $validatedData['prenom'];
        $user->email = $validatedData['email'];
        $user->adresse = $validatedData['adresse'];
        $user->telephone = $validatedData['telephone'];
        $user->profil = $validatedData['profil'];
        $user->password = bcrypt($validatedData['password']); // Hash du mot de passe
        $user->save();

        // Redirection vers la liste des patients avec message de succès
        return redirect()->route('patients.index')->with('success', 'Patient créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = User::where('profil', 'PATIENT')->findOrFail($id);
        return view('pages.front-end.patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = User::where('profil', 'PATIENT')->findOrFail($id);
        return view('pages.front-end.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = User::where('profil', 'PATIENT')->findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->id,
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|numeric',
        ]);

        $patient->nom = $validatedData['nom'];
        $patient->prenom = $validatedData['prenom'];
        $patient->email = $validatedData['email'];
        $patient->adresse = $validatedData['adresse'];
        $patient->telephone = $validatedData['telephone'];
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = User::where('profil', 'PATIENT')->findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }
}
