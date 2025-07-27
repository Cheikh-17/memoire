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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = User::where('profil', 'patient')->where('is_hidden', false);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('prenom', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('telephone', 'like', '%' . $search . '%')
                  ->orWhere('adresse', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy('created_at', 'desc');

        $patients = $query->paginate(10)->appends(['search' => $search]);

        return view('pages.front-end.patient.index', compact('patients', 'search'));
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => ['required','string','regex:/^(77|78|70|76|75)[0-9]{7}$/'],
            'adresse' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ], [
            'telephone.regex' => 'Le numéro de téléphone doit être valide et commencer par 77, 78, 70, 76 ou 75.',
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
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
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        ]);

        // Création du patient dans la table users
        \App\Models\User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            'password' => bcrypt($validated['password']),
            'profil' => 'PATIENT',
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('formPatient')->with('success', 'Patient créé avec succès.');
    }

    // Méthode pour afficher la fiche médicale
    public function ficheMedicale($id)
    {
        $user = User::where('profil', 'patient')->findOrFail($id);
        $consultations = $user->consultations()->with('traitements')->get();

        return view('pages.fiche.patient.fiche-medicale', compact('user', 'consultations'));
    }

    // Méthode pour générer et télécharger la fiche médicale en PDF
    public function ficheMedicalePdf($id)
    {
        $user = User::where('profil', 'patient')->findOrFail($id);
        $consultations = $user->consultations()->with('traitements')->get();

        $cabinet = [
            'logo' => base_path('public/assets/images/d.png'), // chemin absolu local vers le logo
            'nom' => 'Cabinet Baobab Dentaire',
            'telephone' => '33 126 10 12',
            'email' => 'contact@baobabdentaire.com',
        ];

        $pdf = Pdf::loadView('pages.fiche.patient.fiche-medicale-pdf', compact('user', 'consultations', 'cabinet'));

        return $pdf->download('fiche-medicale.pdf');
    }
}