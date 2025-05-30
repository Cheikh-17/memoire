<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ordonnance;

class ordonnanceController extends Controller
{
    /**
     * Affiche la liste des ordonnances pour l'utilisateur connecté.
     */
    public function index()
    {
        $ordonnances = ordonnance::where('idUser', auth()->id())->get();
        return view('pages.patient.ordonnances.index', compact('ordonnances'));
    }

    /**
     * Affiche une ordonnance spécifique.
     */
    public function show(string $id)
    {
        $ordonnance = ordonnance::where('id', $id)
            ->where('idUser', auth()->id())
            ->firstOrFail();

        return view('pages.patient.ordonnances.show', compact('ordonnance'));
    }

    /**
     * Affiche le formulaire de création d'une ordonnance.
     */
    public function create()
    {
        $patients = \App\Models\User::where('profil', 'PATIENT')->get();
        return view('pages.medecin.ordonnances.create', compact('patients'));
    }

    /**
     * Enregistre une nouvelle ordonnance.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'contenu' => 'required|string',
        ]);

        $consultation = \App\Models\Consultation::findOrFail($validated['consultation_id']);

        $ordonnance = new ordonnance();
        $ordonnance->idUser = $consultation->idUser; // id du patient
        $ordonnance->consultation_id = $validated['consultation_id'];
        $ordonnance->contenu = $validated['contenu'];
        $ordonnance->save();

        return redirect()->route('ordonnances.index')->with('success', 'Ordonnance créée avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'une ordonnance.
     */
    public function edit($id)
    {
        $ordonnance = ordonnance::findOrFail($id);
        return view('pages.medecin.ordonnances.edit', compact('ordonnance'));
    }

    /**
     * Met à jour une ordonnance existante.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'contenu' => 'required|string',
        ]);

        $ordonnance = ordonnance::findOrFail($id);
        $ordonnance->consultation_id = $validated['consultation_id'];
        $ordonnance->contenu = $validated['contenu'];
        $ordonnance->save();

        return redirect()->route('ordonnances.index')->with('success', 'Ordonnance mise à jour avec succès.');
    }

    /**
     * Supprime une ordonnance.
     */
    public function destroy(string $id)
    {
        $ordonnance = ordonnance::findOrFail($id);
        $ordonnance->delete();

        return redirect()->route('ordonnances.index')->with('success', 'Ordonnance supprimée avec succès.');
    }
}
