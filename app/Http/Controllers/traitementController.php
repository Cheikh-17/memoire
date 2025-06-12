<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\traitement;
use App\Models\Consultation;

class traitementController extends Controller
{
    /**
     * Affiche la liste des traitements pour l'utilisateur connecté.
     */
    public function index()
    {
        $traitements = traitement::all();
        return view('pages.patient.traitements.index', compact('traitements'));
    }

    /**
     * Affiche un traitement spécifique.
     */
    public function show(string $id)
    {
        $traitement = traitement::where('id', $id)
            ->firstOrFail();

        return view('pages.patient.traitements.show', compact('traitement'));
    }

    /**
     * Affiche le formulaire de création d'un traitement.
     */
    public function create()
    {
        $consultations = Consultation::all();
        return view('pages.medecin.traitements.create', compact('consultations'));
    }

    /**
     * Enregistre un nouveau traitement.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'observation' => 'required|string',
            'description' => 'required|string',
        ]);

        $traitement = new traitement();
        $traitement->consultation_id = $validated['consultation_id'];
        $traitement->observation = $validated['observation'];
        $traitement->description = $validated['description'];
        $traitement->save();

        return redirect()->route('traitements.index')->with('success', 'Traitement créé avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'un traitement.
     */
    public function edit($id)
    {
        $traitement = traitement::findOrFail($id);
        return view('pages.medecin.traitements.edit', compact('traitement'));
    }

    /**
     * Met à jour un traitement existant.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'observation' => 'required|string',
            'description' => 'required|string',
        ]);

        $traitement = traitement::findOrFail($id);
        $traitement->consultation_id = $validated['consultation_id'];
        $traitement->observation = $validated['observation'];
        $traitement->description = $validated['description'];
        $traitement->save();

        return redirect()->route('traitements.index')->with('success', 'Traitement mis à jour avec succès.');
    }

    /**
     * Supprime un traitement.
     */
    public function destroy(string $id)
    {
        $traitement = traitement::findOrFail($id);
        $traitement->delete();

        return redirect()->route('traitements.index')->with('success', 'Traitement supprimé avec succès.');
    }
}
