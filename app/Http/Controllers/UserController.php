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
                case 'MEDECIN':
                case 'PATIENT':
                case 'SECRETAIRE':
                    return redirect()->route('dashboard');
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
     * Show the form for editing the profile of the authenticated user.
     */
    public function editProfile()
    {
        $user = auth()->user();
        return view('pages.front-end.profil.edit', compact('user'));
    }

    /**
     * Update the profile of the authenticated user.
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'telephone' => 'required|string|max:20',
        ]);

        $user->update($validated);

        // Redirection selon le profil
        switch ($user->profil) {
            case 'ADMINISTRATEUR':
                return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès.');
            case 'MEDECIN':
                return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès.');
            case 'PATIENT':
                return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès.');
            case 'SECRETAIRE':
                return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès.');
            default:
                return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the form for changing the password of the authenticated user.
     */
    public function changePasswordForm()
    {
        return view('pages.front-end.profil.change-password');
    }

    /**
     * Update the password of the authenticated user.
     */
    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Vérifier que le mot de passe actuel est correct
        if (!\Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
