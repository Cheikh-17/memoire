@extends('app1')

@section('content')
 
        <div class="card-header">Créer un Utilisateurs</div>
        <div class="card-body">
            <form action="{{ route('form') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">prénom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                        @error('prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="adresse" class="form-label">adresse</label>
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                        @error('adresse')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telephone" class="form-label">telephone</label>
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                        @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="profil" class="form-label">profil</label>
                        <select class="form-control @error('profil') is-invalid @enderror" id="profil" name="profil" required>
                            <option value="" disabled selected>Fait un choix</option>
                            <option value="SECRETAIRE" {{ old('profil') == 'SECRETAIRE' ? 'selected' : '' }}>SECRETAIRE</option>
                            <option value="MEDECIN" {{ old('profil') == 'MEDECIN' ? 'selected' : '' }}>MEDECIN</option>
                            <option value="PATIENT" {{ old('profil') == 'PATIENT' ? 'selected' : '' }}>PATIENT</option>
                            <option value="ADMINISTRATEUR" {{ old('profil') == 'ADMINISTRATEUR' ? 'selected' : '' }}>ADMINISTRATEUR</option>
                        </select>
                        @error('profil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3" id="specialite-container" style="display:none;">
                    <div class="col-md-6">
                        <label for="specialite" class="form-label">Spécialité</label>
                        <select class="form-control @error('specialite') is-invalid @enderror" id="specialite" name="specialite">
                            <option value="" disabled selected>Choisissez une spécialité</option>
                            <option value="Cardiologie" {{ old('specialite') == 'Cardiologie' ? 'selected' : '' }}>Cardiologie</option>
                            <option value="Dermatologie" {{ old('specialite') == 'Dermatologie' ? 'selected' : '' }}>Dermatologie</option>
                            <option value="Neurologie" {{ old('specialite') == 'Neurologie' ? 'selected' : '' }}>Neurologie</option>
                            <option value="Pédiatrie" {{ old('specialite') == 'Pédiatrie' ? 'selected' : '' }}>Pédiatrie</option>
                            <option value="Psychiatrie" {{ old('specialite') == 'Psychiatrie' ? 'selected' : '' }}>Psychiatrie</option>
                            <option value="Radiologie" {{ old('specialite') == 'Radiologie' ? 'selected' : '' }}>Radiologie</option>
                            <option value="Gynécologie" {{ old('specialite') == 'Gynécologie' ? 'selected' : '' }}>Gynécologie</option>
                            <option value="Orthopédie" {{ old('specialite') == 'Orthopédie' ? 'selected' : '' }}>Orthopédie</option>
                            <option value="Urologie" {{ old('specialite') == 'Urologie' ? 'selected' : '' }}>Urologie</option>
                            <option value="Autre" {{ old('specialite') == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('specialite')
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
