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
        $secretaires = User::where('profil', 'secretaire')->get();
        return view('pages.front-end.Secretaire.index', compact('secretaires'));
    }

    public function show($id)
    {
        $secretaire = User::findOrFail($id);
        return view('pages.front-end.Secretaire.show', compact('secretaire'));
    }

    public function edit($id)
    {
        $secretaire = User::findOrFail($id);
        return view('pages.front-end.Secretaire.edit', compact('secretaire'));
    }

    public function update(Request $request, $id)
    {
        $secretaire = User::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users,email,' . $secretaire->id,
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
        ]);

        $secretaire->nom = $validatedData['nom'];
        $secretaire->prenom = $validatedData['prenom'];
        $secretaire->email = $validatedData['email'];
        $secretaire->adresse = $validatedData['adresse'];
        $secretaire->telephone = $validatedData['telephone'];
        $secretaire->save();

        return redirect()->route('secretaire.index')->with('success', 'Secrétaire mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $secretaire = User::findOrFail($id);
        $secretaire->delete();

        return redirect()->route('secretaire.index')->with('success', 'Secrétaire supprimé avec succès.');
    }
}
