<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

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
}