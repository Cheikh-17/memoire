<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
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
}
