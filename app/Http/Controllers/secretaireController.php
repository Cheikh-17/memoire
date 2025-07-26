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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = User::where('profil', 'secretaire')->where('is_hidden', false);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('prenom', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('telephone', 'like', '%' . $search . '%')
                  ->orWhere('adresse', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy('created_at', 'desc');

        $secretaires = $query->paginate(10)->appends(['search' => $search]);

        return view('pages.front-end.Secretaire.index', compact('secretaires', 'search'));
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
