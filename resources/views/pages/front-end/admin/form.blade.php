@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h4>Créer un Utilisateur</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        <script>
                            // Réinitialiser le formulaire après succès
                            document.addEventListener('DOMContentLoaded', function() {
                                var form = document.querySelector('form');
                                if(form) {
                                    form.reset();
                                }
                            });
                        </script>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('form') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                                @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="profil" class="form-label">Profil</label>
                                <select class="form-control @error('profil') is-invalid @enderror" id="profil" name="profil" required>
                                    <option value="" disabled selected>Faites un choix</option>
                                    <option value="SECRETAIRE" {{ old('profil') == 'SECRETAIRE' ? 'selected' : '' }}>SECRETAIRE</option>
                                    <option value="MEDECIN" {{ old('profil') == 'MEDECIN' ? 'selected' : '' }}>MEDECIN</option>
                                    <option value="PATIENT" {{ old('profil') == 'PATIENT' ? 'selected' : '' }}>PATIENT</option>
                                    <option value="ADMINISTRATEUR" {{ old('profil') == 'ADMINISTRATEUR' ? 'selected' : '' }}>ADMINISTRATEUR</option>
                                </select>
                                @error('profil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3" id="specialite-container" style="display:none;">
                            <div class="col-md-6">
                                <label for="specialite" class="form-label">Spécialité</label>
                                <select class="form-control @error('specialite') is-invalid @enderror" id="specialite" name="specialite">
                                    <option value="" disabled selected>Choisissez une spécialité</option>
                                    <option value="Churigien-Dentaire" {{ old('specialite') == 'Churigien-Dentaire' ? 'selected' : '' }}>Churigien-Dentaire</option>
                                    <option value="Paradontologie" {{ old('specialite') == 'Paradontologie' ? 'selected' : '' }}>Paradontologie</option>
                                    <option value="Orthodontie" {{ old('specialite') == 'Orthodontie' ? 'selected' : '' }}>Orthodontie</option>
                                    <option value="Orthodontie-pediatrique" {{ old('specialite') == 'Orthodontie-pediatrique' ? 'selected' : '' }}>Orthodontie-pediatrique</option>
                                    <option value="Radiologie" {{ old('specialite') == 'Radiologie' ? 'selected' : '' }}>Radiologie</option>
                                </select>
                                @error('specialite')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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

<script>
    document.getElementById('profil').addEventListener('change', function() {
        var specialiteContainer = document.getElementById('specialite-container');
        if (this.value === 'MEDECIN') {
            specialiteContainer.style.display = 'block';
            document.getElementById('specialite').setAttribute('required', 'required');
        } else {
            specialiteContainer.style.display = 'none';
            document.getElementById('specialite').removeAttribute('required');
        }
    });
</script>
@endsection
