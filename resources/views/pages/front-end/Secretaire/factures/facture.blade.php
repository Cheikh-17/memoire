@extends('app1')

@section('content')
<div class="container">
    <h1>Facture {{ $facture->id }}</h1>

    <div>
        <strong>Numéro de paiement :</strong> {{ $facture->{'nemero-paiement'} }}<br>
        <strong>Montant :</strong> {{ number_format($facture->montant, 2) }} CFA<br>
        <strong>Date d'émission :</strong> {{ $facture->created_at->format('d/m/Y') }}<br>
    </div>

    <h2>Patient</h2>
    <div>
        <strong>Nom :</strong> {{ $facture->user->nom }} {{ $facture->user->prenom }}<br>
        <strong>Email :</strong> {{ $facture->user->email }}<br>
        <strong>Adresse :</strong> {{ $facture->user->adresse }}<br>
        <strong>Téléphone :</strong> {{ $facture->user->telephone }}<br>
    </div>

    <h2>Consultation</h2>
    <div>
        <strong>Date :</strong> {{ $facture->consultation->date }}<br>
        <strong>Heure :</strong> {{ $facture->consultation->heure }}<br>
        <strong>Motif :</strong> {{ $facture->consultation->motif }}<br>
        <strong>Diagnostic :</strong> {{ $facture->consultation->diagnostic }}<br>
    </div>

    {{-- <h2>Médecin</h2>
    <div>
        <strong>Nom :</strong> {{ $facture->consultation->medecin->nom ?? 'N/A' }} {{ $facture->consultation->medecin->prenom ?? '' }}<br>
        <strong>Email :</strong> {{ $facture->consultation->medecin->email ?? 'N/A' }}<br>
        <strong>Téléphone :</strong> {{ $facture->consultation->medecin->telephone ?? 'N/A' }}<br>
    </div> --}}

    <a href="{{ route('facture.download', $facture->id) }}" class="btn btn-success mt-3">Télécharger la facture (PDF)</a>
</div>
@endsection
