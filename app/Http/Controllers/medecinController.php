<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;

class medecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins= Medecin::with('user')->where('is_hidden', false)->get();
        return view('pages.front-end.medecin.index', compact('medecins'));
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
         $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users',
            'adresse' => 'required|string|max:255',
            'telephone' => ['required', 'string', 'regex:/^(77|78|70|76|75)[0-9]{7}$/'],
            'profil' => 'required|string|max:50',
            'password' => 'required|string|min:8',
            'specialite' => 'required|string|max:200',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.max' => 'Le nom ne doit pas dépasser 100 caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 100 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'email.max' => 'L\'email ne doit pas dépasser 150 caractères.',
            'adresse.required' => 'L\'adresse est obligatoire.',
            'adresse.max' => 'L\'adresse ne doit pas dépasser 255 caractères.',
            'telephone.required' => 'Le téléphone est obligatoire.',
            'telephone.regex' => 'Le numéro de téléphone doit être valide et commencer par 77, 78, 70, 76 ou 75.',
            'profil.required' => 'Le profil est obligatoire.',
            'profil.max' => 'Le profil ne doit pas dépasser 50 caractères.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'specialite.required' => 'La spécialité est obligatoire.',
            'specialite.max' => 'La spécialité ne doit pas dépasser 200 caractères.',
        ]);

        // Utiliser une transaction pour s'assurer que les deux insertions réussissent
        DB::beginTransaction();
        
        try {
            // Créer un nouvel utilisateur
            $user = User::create([
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'email' => $validated['email'],
                'adresse' => $validated['adresse'],
                'telephone' => $validated['telephone'],
                'profil' => $validated['profil'],
                'password' => Hash::make($validated['password']),
            ]);

            // Créer un nouveau médecin lié à cet utilisateur
            $medecin = Medecin::create([
                'id' => $user->id,
                'specialite' => $validated['specialites'],
            ]);

            DB::commit();
            
            // Retourner les deux modèles avec une relation chargée
            return response()->json([
                'message' => 'Médecin enregistré avec succès',
                'medecin' => $medecin->load('user')
            ], 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Erreur lors de l\'enregistrement du médecin',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medecin = Medecin::findOrFail($id);
        return view('pages.front-end.medecin.show', compact('medecin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medecin = Medecin::findOrFail($id);
        return view('pages.front-end.medecin.edit', compact('medecin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medecin = Medecin::findOrFail($id);
        $user = $medecin->user;

        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users,email,' . $user->id,
            'adresse' => 'required|string|max:255',
            'telephone' => ['required', 'string', 'regex:/^(77|78|70|76|75)[0-9]{7}$/'],
            'specialite' => 'required|string|max:200',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.max' => 'Le nom ne doit pas dépasser 100 caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 100 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'email.max' => 'L\'email ne doit pas dépasser 150 caractères.',
            'adresse.required' => 'L\'adresse est obligatoire.',
            'adresse.max' => 'L\'adresse ne doit pas dépasser 255 caractères.',
            'telephone.required' => 'Le téléphone est obligatoire.',
            'telephone.max' => 'Le téléphone ne doit pas dépasser 15 caractères.',
            'telephone.regex' => 'Le numéro de téléphone doit être valide et commencer par 77, 78, 70, 76 ou 75.',
            'specialite.required' => 'La spécialité est obligatoire.',
            'specialite.max' => 'La spécialité ne doit pas dépasser 200 caractères.',
        ]);
        

        $user->nom = $validatedData['nom'];
        $user->prenom = $validatedData['prenom'];
        $user->email = $validatedData['email'];
        $user->adresse = $validatedData['adresse'];
        $user->telephone = $validatedData['telephone'];
        $user->save();

        $medecin->specialite = $validatedData['specialite'];
        $medecin->save();

        return redirect()->route('medecin.index')->with('success', 'Médecin mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medecin = Medecin::findOrFail($id);
        $user = $medecin->user;

        // Masquer le médecin
        $medecin->is_hidden = true;
        $medecin->save();

        // Masquer l'utilisateur lié si besoin
        if ($user) {
            $user->is_hidden = true;
            $user->save();
        }

        return redirect()->route('medecin.index')->with('success', 'Médecin masqué avec succès.');
    }
}
