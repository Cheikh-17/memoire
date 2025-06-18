@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Secrétaire</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $secretaire->nom }}</p>
            <p><strong>Prénom :</strong> {{ $secretaire->prenom }}</p>
            <p><strong>Email :</strong> {{ $secretaire->email }}</p>
            <p><strong>Téléphone :</strong> {{ $secretaire->telephone }}</p>
            <p><strong>Adresse :</strong> {{ $secretaire->adresse }}</p>
            <a href="{{ route('secretaire.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('secretaire.edit', $secretaire->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
@endsection
