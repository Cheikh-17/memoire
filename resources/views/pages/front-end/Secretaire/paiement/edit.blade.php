@extends('app1')

@section('content')
<div class="container">
    <h1>Modifier le paiement #{{ $paiement->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paiement.update', $paiement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="idUser">Utilisateur</label>
            <select name="idUser" id="idUser" class="form-control" required>
                <option value="">Sélectionnez un utilisateur</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $paiement->idUser == $user->id ? 'selected' : '' }}>
                        {{ $user->nom }} {{ $user->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="numero-paiement">Numéro de paiement</label>
            <input type="text" name="numero-paiement" id="numero-paiement" class="form-control" value="{{ $paiement->{'numero-paiement'} }}" required>
        </div>

        <div class="form-group">
            <label for="date-paiement">Date de paiement</label>
            <input type="date" name="date-paiement" id="date-paiement" class="form-control" value="{{ $paiement->{'date-paiement'} }}" required>
        </div>

        <div class="form-group">
            <label for="montant">Montant (CFA)</label>
            <input type="number" step="0.01" name="montant" id="montant" class="form-control" value="{{ $paiement->montant }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        <a href="{{ route('paiement.index') }}" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
@endsection
