<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\medecin;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        

    // Liste des spécialités autorisées
    $specialitesAutorisees = [
        'Cardiologie',
        'Dermatologie',
        'Neurologie',
        'Pédiatrie',
        'Psychiatrie',
        'Radiologie',
        'Gynécologie',
        'Orthopédie',
        'Urologie',
        'Autre'
    ];

    // Valider les données avec condition sur specialite
    $validated = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'adresse' => 'required|string',
        'email' => 'required|email|unique:users',
        'telephone' => 'required|string',
        'password' => 'required|string',
        'profil' => 'required|in:ADMINISTRATEUR,SECRETAIRE,MEDECIN,PATIENT',
        'specialite' => ['required_if:profil,MEDECIN', 'string', 'in:' . implode(',', $specialitesAutorisees)],
    ]);

    
    // Créer l'utilisateur
    $user = User::create([
        'nom' => $validated['nom'],
        'prenom' => $validated['prenom'],
        'adresse' => $validated['adresse'],
        'email' => $validated['email'],
        'telephone' => $validated['telephone'],
        'password' => bcrypt($validated['password']),
        'profil' => $validated['profil'],
    ]);

    
    // Si le profil est 'medecin', créer l'entrée dans la table medecins
    if ($validated['profil'] === 'MEDECIN') {
        medecin::create([
            'idUser' => $user->id,
            'specialite' => $validated['specialite'],
        ]);
        

    }

    return redirect()->route('home')->with('success', 'Utilisateur enregistré avec succès.');
    }

    /**
     * Handle user login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirection selon le profil
            switch ($user->profil) {
                case 'ADMINISTRATEUR':
                    return redirect()->route('dashboard-admin');
                case 'MEDECIN':
                    return redirect()->route('dashboard-medecin');
                case 'PATIENT':
                    return redirect()->route('dashboard-patient');
                case 'SECRETAIRE':
                    return redirect()->route('dashboard-secretaire');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'email' => 'Profil utilisateur non reconnu.',
                    ]);
            }
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas.',
        ])->onlyInput('email');
    }

    /**
     * Handle user logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
