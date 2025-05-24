@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier un médecin</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medecin.update', $medecin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $medecin->user->nom ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $medecin->user->prenom ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $medecin->user->email ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $medecin->user->telephone ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $medecin->user->adresse ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="specialite">Spécialité</label>
            <input type="text" name="specialite" id="specialite" class="form-control" value="{{ old('specialite', $medecin->specialite ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('medecin.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
