@extends('app1')

@section('content')
<div class="container">
    <h1>Détails de l'ordonnance {{ $ordonnance->id }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID :</strong> {{ $ordonnance->id }}</p>
            <p><strong>Date de création :</strong> {{ $ordonnance->created_at->format('d/m/Y') }}</p>
            <p><strong>Contenu :</strong></p>
            <p>{{ $ordonnance->contenu }}</p>
            <a href="{{ route('medecin.ordonnances.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
