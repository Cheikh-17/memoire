@extends('app1')

@section('content')
<div class="container">
    <h1>Créer un nouveau paiement</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paiement.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idUser">Utilisateur</label>
            <select name="idUser" id="idUser" class="form-control" required>
                <option value="">Sélectionnez un utilisateur</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $idUser ? 'selected' : '' }}>{{ $user->nom }} {{ $user->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="numero-paiement">Numéro de paiement</label>
            <input type="text" name="numero-paiement" id="numero-paiement" class="form-control" readonly value="{{ old('numero-paiement', $numero_paiement) }}">
        </div>

        <div class="form-group">
            <label for="date-paiement">Date de paiement</label>
            <input type="date" name="date-paiement" id="date-paiement" class="form-control" readonly value="{{ old('date-paiement', $date_paiement) }}">
        </div>

        <div class="form-group">
            <label for="montant">Montant (CFA)</label>
            <input type="number" step="0.01" name="montant" id="montant" class="form-control" required value="{{ old('montant', $montant) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
        <a href="{{ route('paiement.index') }}" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
@endsection
