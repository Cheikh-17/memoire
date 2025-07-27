<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facture;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class FactureController extends Controller
{
    public function index()
    {
        $factures = facture::with(['user', 'consultation'])->paginate(10);

        return view('pages.front-end.Secretaire.factures.index', compact('factures'));
    }

    public function create(\Illuminate\Http\Request $request)
    {
        // Récupérer les utilisateurs pour le formulaire
        $users = \App\Models\User::where('profil', 'patient')->where('is_hidden', false)->get();

        $montant = session('montant', '');
        $idUser = $request->query('idUser', '');

        $date_emission = date('Y-m-d');

        if ($idUser) {
            $consultations = \App\Models\Consultation::where('idUser', $idUser)->get();
        } else {
            $consultations = collect(); // vide au départ
        }

        return view('pages.front-end.Secretaire.factures.create', compact('users', 'consultations', 'montant', 'idUser', 'date_emission'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'idUser' => 'required|exists:users,id',
            'consultation_id' => 'required|exists:consultations,id',
            'date-emission' => 'required|date',
            'montant' => 'required|numeric|min:0',
        ]);

        $facture = facture::create($validated);
 
        return redirect()->route('paiement.create')
            ->with('success', 'Facture créée avec succès. Veuillez créer le paiement.')
            ->with('montant', $facture->montant)
            ->with('idUser', $facture->idUser)
            ->with('date_paiement', date('Y-m-d'))
             
            ->with('numero_paiement', $facture->id);
    }

    public function show($id)
    {
        $facture = facture::with(['user', 'consultation.medecin'])->findOrFail($id);

        return view('pages.front-end.Secretaire.facture.facture', compact('facture'));
    }

    public function download($id)
    {
        $facture = facture::with(['user', 'consultation.medecin'])->findOrFail($id);
        $secretaire = Auth::user();

        // Informations du cabinet dentaire à afficher sur la facture
        $cabinet = [
            'nom' => 'Cabinet Dentaire ',
            'telephone' => '33 126 10 12',
            'email' => 'contact@cabinetdentaireabc.com',
            // 'adresse' => '123 Rue de la Santé, Abidjan, Côte d\'Ivoire',
            'logo' => public_path('assets/images/d.png'),
        ];

        $pdf = Pdf::loadView('pages.front-end.Secretaire.factures.facture_pdf', compact('facture', 'secretaire', 'cabinet'));

        return $pdf->download('facture_'.$facture->id.'.pdf');
    }
}
