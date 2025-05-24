@extends('app1')

@section('content')
<div class="container">
    <h1>Détails du médecin</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $medecin->user->nom ?? '' }} {{ $medecin->user->prenom ?? '' }}</h5>
            <p class="card-text"><strong>Email :</strong> {{ $medecin->user->email ?? '' }}</p>
            <p class="card-text"><strong>Téléphone :</strong> {{ $medecin->user->telephone ?? '' }}</p>
            <p class="card-text"><strong>Adresse :</strong> {{ $medecin->user->adresse ?? '' }}</p>
            <p class="card-text"><strong>Spécialité :</strong> {{ $medecin->specialite }}</p>
            <a href="{{ route('medecin.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('medecin.edit', $medecin->id) }}" class="btn btn-warning">Éditer</a>
        </div>
    </div>
</div>
@endsection
