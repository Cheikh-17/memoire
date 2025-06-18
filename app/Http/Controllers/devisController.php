<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\devis; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return view('pages.front-end.admin.createDevis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un devis.');
        }

        $data = $request->all();

        // Mapping du montant vers cout_estimer
        if (isset($data['montant'])) {
            $data['cout_estimer'] = $data['montant'];
            unset($data['montant']);
        }

        $data['idUser'] = Auth::id(); // Toujours un ID ici

        $devis = devis::create($data);

        $pdf = Pdf::loadView('devis.pdf', compact('devis'));
        return $pdf->download('devis_'.$devis->id.'.pdf');
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
