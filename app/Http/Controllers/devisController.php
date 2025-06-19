<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\devis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class devisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = User::where('profil', 'patient')->get();
        return view('pages.front-end.Secretaire.devis.createDevis', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'montant' => 'required|numeric|min:0',
        ]);

        $devis = new devis();
        $devis->idUser = $validatedData['patient_id'];
        $devis->description = $validatedData['description'] ?? '';
        $devis->{"cout-estimer"} = $validatedData['montant'];
        $devis->save();

        $devis->load('client');

        if (!$devis->client) {
            return back()->withErrors(['patient' => 'Le patient associé au devis est introuvable.']);
        }

        $pdf = Pdf::loadView('pages.front-end.Secretaire.devis.devisPdf', compact('devis'));

        return $pdf->download('devis_' . $devis->id . '.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
