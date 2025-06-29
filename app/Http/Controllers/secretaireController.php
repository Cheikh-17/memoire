<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

use App\Models\User;

class SecretaireController extends Controller
{
    public function dashboard()
    {
        $consultations = Consultation::with(['patient', 'medecin'])
            ->whereDate('date', now()->toDateString())
            ->orderBy('heure')
            ->get();

        return view('pages.front-end.Secretaire.DashboardSecretaire', compact('consultations'));
    }

    public function index()
    {
        $secretaires = User::where('profil', 'secretaire')->where('is_hidden', false)->get();
        return view('pages.front-end.Secretaire.index', compact('secretaires'));
    }

    public function show($id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        return view('pages.front-end.Secretaire.show', compact('secretaire'));
    }

    public function edit($id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        return view('pages.front-end.Secretaire.edit', compact('secretaire'));
    }

    public function update(Request $request, $id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        $secretaire->update($request->all());
        return redirect()->route('secretaire.index')->with('success', 'Secrétaire mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $secretaire = User::where('profil', 'secretaire')->findOrFail($id);
        $secretaire->is_hidden = true;
        $secretaire->save();
        return redirect()->route('secretaire.index')->with('success', 'Secrétaire masquée avec succès.');
    }
}
