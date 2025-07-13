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
        $patients = User::where('profil', 'patient')->where('is_hidden', false)->get();
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
        $patient->is_hidden = true;
        $patient->save();
        return redirect()->route('patients.index')->with('success', 'Patient masqué avec succès.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => ['required','string','regex:/^(77|78|70|76|75)[0-9]{7}$/'],
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string',
            'password' => 'required|string|min:8',
        ], [
            'telephone.regex' => 'Le numéro de téléphone doit être valide et commencer par 77, 78, 70, 76 ou 75.',
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'adresse.required' => 'L\'adresse est obligatoire.',
            'adresse.string' => 'L\'adresse doit être une chaîne de caractères.',
            'adresse.max' => 'L\'adresse ne doit pas dépasser 255 caractères.',
            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'date_naissance.date' => 'La date de naissance doit être une date valide.',
            'sexe.required' => 'Le sexe est obligatoire.',
            'sexe.string' => 'Le sexe doit être une chaîne de caractères.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
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
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('patients.create')->with('success', 'Patient créé avec succès.');
    }

    // Méthode pour afficher la fiche médicale
    public function ficheMedicale($id)
    {
        $user = User::where('profil', 'patient')->findOrFail($id);
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