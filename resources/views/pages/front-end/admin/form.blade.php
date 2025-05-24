@extends('layouts.app')
@section('content')
    <div class="card-header">Créer un Utilisateurs</div>
        <div class="card-body">
            <form action="{{ route('form') }}" method="POST">
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
                        <input type="numeric" class="form-control" id="telephone" name="telephone" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="profil" class="form-label">profil</label>
                        <select class="form-control" id="profil" name="profil" required>
                            <option value="" disabled selected>Fait un choix</option>
                            <option value="SECRETAIRE">SECRETAIRE</option>
                            <option value="MEDECIN">MEDECIN</option>
                            <option value="PATIENT">PATIENT</option>
                            <option value="ADMINISTRATEUR">ADMINISTRATEUR</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="row mb-3" id="specialite-container" style="display:none;">
                    <div class="col-md-6">
                        <label for="specialite" class="form-label">Spécialité</label>
                        <select class="form-control" id="specialite" name="specialite">
                            <option value="" disabled selected>Choisissez une spécialité</option>
                            <option value="Cardiologie">Cardiologie</option>
                            <option value="Dermatologie">Dermatologie</option>
                            <option value="Neurologie">Neurologie</option>
                            <option value="Pédiatrie">Pédiatrie</option>
                            <option value="Psychiatrie">Psychiatrie</option>
                            <option value="Radiologie">Radiologie</option>
                            <option value="Gynécologie">Gynécologie</option>
                            <option value="Orthopédie">Orthopédie</option>
                            <option value="Urologie">Urologie</option>
                            <option value="Autre">Autre</option>
                        </select>
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
 
        