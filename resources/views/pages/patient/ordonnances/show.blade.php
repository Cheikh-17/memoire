@extends('app1')

@section('content')
<div class="container">
    <h1>Détails de l'ordonnance #{{ $ordonnance->id }}</h1>
    <p><strong>Contenu :</strong></p>
    <pre>{{ $ordonnance->contenu }}</pre>
    <p><strong>Date de création :</strong> {{ $ordonnance->created_at->format('d/m/Y') }}</p>
    <a href="{{ route('consultations.downloadOrdonnance', $ordonnance->id) }}" class="btn btn-success">Télécharger l'ordonnance</a>
    <a href="{{ route('ordonnances.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
