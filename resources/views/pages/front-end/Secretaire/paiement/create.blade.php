@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer un nouveau paiement</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('paiement.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="idUser" class="form-label fw-semibold">Utilisateur</label>
                            <select name="idUser" id="idUser" class="form-select" required>
                                <option value="">Sélectionnez un utilisateur</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $idUser ? 'selected' : '' }}>{{ $user->nom }} {{ $user->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="numero-paiement" class="form-label fw-semibold">Numéro de paiement</label>
                            <input type="text" name="numero-paiement" id="numero-paiement" class="form-control" readonly value="{{ old('numero-paiement', $numero_paiement) }}">
                        </div>

                        <div class="mb-3">
                            <label for="date-paiement" class="form-label fw-semibold">Date de paiement</label>
                            <input type="date" name="date-paiement" id="date-paiement" class="form-control" readonly value="{{ old('date-paiement', $date_paiement) }}">
                        </div>

                        <div class="mb-3">
                            <label for="montant" class="form-label fw-semibold">Montant (CFA)</label>
                            <input type="number" step="0.01" name="montant" id="montant" class="form-control" required value="{{ old('montant', $montant) }}">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                            <a href="{{ route('paiement.index') }}" class="btn btn-secondary ms-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
