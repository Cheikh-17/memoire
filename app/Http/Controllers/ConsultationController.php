<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\traitement;
use App\Models\ordonnance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
class ConsultationController extends Controller
{
    /**
     * Affiche la liste des consultations pour un utilisateur (patient).
     */
    public function index()
    {
        $userId = auth()->id();
        $consultations = Consultation::with(['traitements', 'ordonnances'])
            ->where('idUser', $userId)
            ->get();

        return view('pages.patient.consultations.index', compact('consultations'));
    }

    /**
     * Affiche la liste de toutes les consultations (pour le médecin).
     */
    public function indexMedecin()
    {
        $consultations = Consultation::all();

        return view('pages.front-end.medecin.consultations.liste', compact('consultations'));
    }

    /**
     * Affiche une consultation spécifique avec ses traitements et ordonnances.
     */
    public function show($id)
    {
        $consultation = Consultation::with(['traitements', 'ordonnances'])
            ->where('idUser', auth()->id())
            ->findOrFail($id);

        return view('pages.patient.consultations.show', compact('consultation'));
    }

    /**
     * Affiche le formulaire de création d'une consultation.
     */
    public function create()
    {
        $patients = \App\Models\User::where('profil', 'PATIENT')->get();
        return view('pages.front-end.medecin.consultations.create', compact('patients'));
    }

    /**
     * Enregistre une nouvelle consultation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'diagnostic' => 'nullable|string|max:1000',
            'motif' => 'nullable|string|max:1000',
            'idUser' => 'required|integer',
            'heure' => 'nullable',
        ]);

        $validated['idMedecin'] = Auth::id(); // Ajoute l'id du médecin connecté avec la facade Auth

        $consultation = Consultation::create($validated);


        return redirect()->route('medecin.consultations.show', $consultation->id)
            ->with('success', 'Consultation créée avec succès et fiche médicale générée.');
    }

    /**
     * Permet au patient de télécharger une ordonnance spécifique.
     */
    public function downloadOrdonnance($id)
    {
        $ordonnance = ordonnance::where('id', $id)
            ->where('idUser', auth()->id())
            ->firstOrFail();

        $user = \App\Models\User::find($ordonnance->idUser);

        $content = $ordonnance->contenu;
        $filename = "ordonnance_{$ordonnance->id}.pdf";

        $pdf = Pdf::loadView('pages.patient.ordonnances.pdf', [
            'content' => $content,
            'user' => $user,
        ]);

        return $pdf->download($filename);
    }

    /**
     * Retourne les consultations d'un patient donné en JSON.
     */
    public function getConsultationsByPatient($patientId)
    {
        $consultations = Consultation::where('idUser', $patientId)->get();
        return response()->json($consultations);
    }
}
