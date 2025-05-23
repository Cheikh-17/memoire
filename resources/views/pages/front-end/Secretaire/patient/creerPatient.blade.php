@extends('app1')

@section('content')
    <div class="card-header">Créer un patient</div>
    <div class="card-body">
        <form action="{{ route('creerSecretaire') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label">nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="adresse" class="form-label">adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telephone" class="form-label">telephone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" required>
                </div>
                <div class="col-md-6">
                    <label for="profil" class="form-label">profil</label>
                    <input type="text" class="form-control" id="profil" name="profil" value="PATIENT" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6">
                    <!-- Champ vide pour alignement -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <button type="submit" class="btn btn-primary w-100">Créer</button>
                </div>
                <div class="col-md-6 mb-2">
                    <a href="{{ url()->previous() }}" class="btn btn-danger w-100">Annuler</a>
                </div>
            </div>
        </form>
    </div>
@endsection
