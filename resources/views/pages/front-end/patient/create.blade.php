{{-- filepath: resources/views/pages/front-end/patient/create.blade.php --}}
@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer un patient</h4>
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

                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label fw-semibold">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" required value="{{ old('nom') }}">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label fw-semibold">Prénom</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" required value="{{ old('prenom') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label fw-semibold">Téléphone</label>
                            <input type="text" name="telephone" id="telephone" class="form-control" required value="{{ old('telephone') }}">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label fw-semibold">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control" required value="{{ old('adresse') }}">
                        </div>
                        <div class="mb-3">
                            <label for="date_naissance" class="form-label fw-semibold">Date de naissance</label>
                            <input type="date" name="date_naissance" id="date_naissance" class="form-control" required value="{{ old('date_naissance') }}">
                        </div>
                        <div class="mb-3">
                            <label for="sexe" class="form-label fw-semibold">Sexe</label>
                            <select name="sexe" id="sexe" class="form-select" required>
                                <option value="">Sélectionner</option>
                                <option value="Homme" {{ old('sexe') == 'Homme' ? 'selected' : '' }}>Homme</option>
                                <option value="Femme" {{ old('sexe') == 'Femme' ? 'selected' : '' }}>Femme</option>
                                <option value="Autre" {{ old('sexe') == 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
