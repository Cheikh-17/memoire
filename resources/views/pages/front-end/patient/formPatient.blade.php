@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h4>Créer un patient</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('formPatient.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label fw-semibold">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label fw-semibold">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="adresse" class="form-label fw-semibold">Adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone" class="form-label fw-semibold">Téléphone</label>
                                <input type="number" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="profil" class="form-label fw-semibold">Profil</label>
                                <input type="text" class="form-control" id="profil" name="profil" value="PATIENT" readonly required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold">Mot de passe</label>
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
            </div>
        </div>
    </div>
</div>
@endsection
