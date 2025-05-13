<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins= Medecin::all();
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
            'telephone' => 'required|string|max:15',
            'profil' => 'required|string|max:50',
            'password' => 'required|string|min:8',
            'specialite' => 'required|string|max:200',
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
        return view('medecin.edit', compact('medecin'));
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
