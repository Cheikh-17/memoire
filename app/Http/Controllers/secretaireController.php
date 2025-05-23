<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class secretaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs avec profil = 'secretaire'
        $secretaires = User::where('profil', 'secretaire')->get();

        // Retourner la vue avec la liste des secrétaires
        return view('pages.front-end.Secretaire.index', compact('secretaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        return view('pages.front-end.Secretaire.show', compact('secretaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        return view('pages.front-end.Secretaire.edit', compact('secretaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $secretaire->id,
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|numeric',
        ]);

        $secretaire->nom = $validatedData['nom'];
        $secretaire->prenom = $validatedData['prenom'];
        $secretaire->email = $validatedData['email'];
        $secretaire->adresse = $validatedData['adresse'];
        $secretaire->telephone = $validatedData['telephone'];
        $secretaire->save();

        return redirect()->route('secretaire.index')->with('success', 'Secrétaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        $secretaire->delete();

        return redirect()->route('secretaire.index')->with('success', 'Secrétaire supprimé avec succès.');
    }
}
