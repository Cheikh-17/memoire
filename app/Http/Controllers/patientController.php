<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::where('profil', 'patient')->get();
        return view('pages.front-end.patient.index', compact('patients'));
    }

    public function show($id)
    {
        $patient = User::findOrFail($id);
        return view('pages.front-end.patient.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = User::findOrFail($id);
        return view('pages.front-end.patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->id,
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string',
        ]);

        $patient->name = $validatedData['name'];
        $patient->prenom = $validatedData['prenom'];
        $patient->email = $validatedData['email'];
        $patient->telephone = $validatedData['telephone'];
        $patient->adresse = $validatedData['adresse'];
        // $patient->date_naissance = $validatedData['date_naissance'];
        // $patient->sexe = $validatedData['sexe'];
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $patient = User::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    public function create()
    {
        // Affiche le formulaire de création de patient
        return view('pages.front-end.patient.create');
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
            'name' => $validated['name'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            //'date_naissance' => $validated['date_naissance'],
           // 'sexe' => $validated['sexe'],
            'password' => bcrypt($validated['password']),
            'profil' => 'patient',
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('patients.create')->with('success', 'Patient créé avec succès.');
    }
}
