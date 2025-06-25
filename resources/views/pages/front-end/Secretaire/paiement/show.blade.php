@extends('app1')

@section('content')
<div class="container">
    <h1>Détails du paiement #{{ $paiement->id }}</h1>

    <div>
        <strong>Utilisateur :</strong> {{ $paiement->user->nom ?? 'N/A' }} {{ $paiement->user->prenom ?? '' }}<br>
        <strong>Numéro de paiement :</strong> {{ $paiement->{'numero-paiement'} }}<br>
        <strong>Date de paiement :</strong> {{ \Carbon\Carbon::parse($paiement->{'date-paiement'})->format('d/m/Y') }}<br>
        <strong>Montant :</strong> {{ number_format($paiement->montant, 2) }} CFA<br>
        <strong>Date de création :</strong> {{ $paiement->created_at->format('d/m/Y') }}<br>
        <strong>Date de mise à jour :</strong> {{ $paiement->updated_at->format('d/m/Y') }}<br>
    </div>

    <a href="{{ route('paiement.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    <a href="{{ route('paiement.edit', $paiement->id) }}" class="btn btn-warning mt-3">Modifier</a>
</div>
@endsection
