<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\User;
use Illuminate\Http\Request;

class paiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiements = paiement::with('user')->paginate(10);
        return view('pages.front-end.Secretaire.paiement.index', compact('paiements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('profil', 'patient')->get();

        $numero_paiement = session('numero_paiement', '');
        $montant = session('montant', '');
        $idUser = session('idUser', '');
        $date_paiement = session('date_paiement', '');

        return view('pages.front-end.Secretaire.paiement.create', compact('users', 'numero_paiement', 'montant', 'idUser', 'date_paiement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idUser' => 'required|exists:users,id',
            'numero-paiement' => 'required|string|max:255',
            'date-paiement' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        $paiement = paiement::create($request->all());

        // Récupérer l'id de la facture via le numero-paiement
        $factureId = $paiement->{'numero-paiement'};

        // Rediriger vers la route de téléchargement PDF de la facture
        return redirect()->route('facture.download', ['id' => $factureId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paiement = paiement::with('user')->findOrFail($id);
        return view('pages.front-end.Secretaire.paiement.show', compact('paiement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paiement = paiement::findOrFail($id);
        $users = User::all();
        return view('pages.front-end.Secretaire.paiement.edit', compact('paiement', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'idUser' => 'required|exists:users,id',
            'numero-paiement' => 'required|string|max:255',
            'date-paiement' => 'required|date',
            'montant' => 'required|numeric|min:3000',
        ]);

        $paiement = paiement::findOrFail($id);
        $paiement->update($request->all());

        return redirect()->route('paiement.index')->with('success', 'Paiement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paiement = paiement::findOrFail($id);
        $paiement->is_hidden = true;
        $paiement->save();

        return redirect()->route('paiement.index')->with('success', 'Paiement masqué avec succès.');
    }

     
}
