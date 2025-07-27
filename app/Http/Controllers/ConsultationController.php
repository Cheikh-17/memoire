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
    public function index(Request $request)
    {
        $userId = auth()->id();
        $search = $request->input('search');

        $query = Consultation::with(['traitements', 'ordonnances'])
            ->where('idUser', $userId);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('motif', 'like', '%' . $search . '%')
                  ->orWhere('diagnostic', 'like', '%' . $search . '%')
                  ->orWhere('date', 'like', '%' . $search . '%')
                  ->orWhere('heure', 'like', '%' . $search . '%');
            });
        }

        $consultations = $query->get();

        return view('pages.patient.consultations.index', compact('consultations', 'search'));
    }

    /**
     * Retourne les détails d'une consultation pour le médecin en JSON.
     */
public function showForMedecin($id)
    {
        $consultation = Consultation::with(['traitements', 'ordonnances', 'patient'])->findOrFail($id);
        return response()->json($consultation);
    }

    /**
     * Affiche la liste de toutes les consultations (pour le médecin).
     */
    public function indexMedecin(Request $request)
    {
        $search = $request->input('search');

        $query = Consultation::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('motif', 'like', '%' . $search . '%')
                  ->orWhere('diagnostic', 'like', '%' . $search . '%')
                  ->orWhere('date', 'like', '%' . $search . '%')
                  ->orWhere('heure', 'like', '%' . $search . '%');
            });
        }

        // Change ordering to created_at descending to get last registered consultation first
        $query->orderBy('created_at', 'desc');

        $consultations = $query->paginate(10)->appends(['search' => $search]);

        return view('pages.front-end.medecin.consultations.liste', compact('consultations', 'search'));
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
        $patients = \App\Models\User::where('profil', 'PATIENT')->orderBy('created_at', 'desc')->get();
        return view('pages.front-end.medecin.consultations.create', compact('patients'));
    }

    /**
     * Enregistre une nouvelle consultation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'diagnostic' => 'nullable|string|max:1000',
            'motif' => 'nullable|string|max:1000',
            'idUser' => 'required|integer',
            'heure' => 'nullable',
        ]);

        $validated['idMedecin'] = Auth::id(); // Ajoute l'id du médecin connecté avec la facade Auth

        $consultation = Consultation::create($validated);


        return redirect()->route('medecin.consultations.liste')
            ->with('success', 'Consultation créée avec succès.');
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

        // Récupérer les informations du cabinet pour le logo, email, téléphone
        $cabinet = [
            'logo' => base_path('public/assets/images/d.png'), // chemin absolu local vers le logo
            'nom' => 'Cabinet Baobab Dentaire',
            'telephone' => '0123456789',
            'email' => 'contact@baobabdentaire.com',
        ];

        $pdf = Pdf::loadView('pages.patient.ordonnances.pdf', [
            'content' => $content,
            'user' => $user,
            'cabinet' => $cabinet,
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
