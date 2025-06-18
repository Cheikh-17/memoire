<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\traitement;
use App\Models\ordonnance;
use Carbon\Carbon;
use App\Models\User; // Assurez-vous d'importer le modèle User si nécessaire
use App\Models\medecin; // Correction du nom du modèle avec majuscule

class ConsultationController extends Controller
{
    /**
     * Affiche la liste des consultations pour un utilisateur (patient).
     */
    public function index()
    {
        // $userId = auth()->id();
        // $consultations = Consultation::with(['traitements', 'ordonnances'])
        //     ->where('idUser', $userId)
        //     ->get();

            $consultations = \App\Models\Consultation::whereDate('date', now()->toDateString())->get();


        return view('pages.patient.consultations.index', compact('consultations'));
    }

    /**
     * Affiche la liste de toutes les consultations (pour le médecin).
     */
    public function indexmedecin()
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
    public function consultationsDuJour()
    {
        // Correction : utiliser le champ 'date' au lieu de 'date_consultation' pour filtrer les consultations du jour
        $consultations = Consultation::with(['patient', 'medecin'])
            ->whereDate('date', Carbon::today())
            ->orderBy('heure', 'asc')
            ->get();

        return view('pages.front-end.Secretaire.DashboardSecretaire', compact('consultations'));
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

        // Récupérer le medecin lié à l'utilisateur authentifié
        $medecin = \App\Models\medecin::where('idUser', auth()->id())->first();

        if (!$medecin) {
            return redirect()->back()->withErrors(['error' => 'Utilisateur authentifié n\'est pas un médecin valide.']);
        }

        // Ajouter idMedecin depuis le medecin trouvé
        $validated['idMedecin'] = $medecin->getKey();

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

        $content = $ordonnance->contenu;
        $filename = "ordonnance_{$ordonnance->id}.txt";

        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
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
