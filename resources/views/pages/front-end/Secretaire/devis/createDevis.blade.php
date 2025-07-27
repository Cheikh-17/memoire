@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer un devis</h4>
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

                    <form action="{{ route('devis.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="patient_id" class="form-label fw-semibold">Patient</label>
                            <select name="patient_id" id="patient_id" class="form-select" required>
                                <option value="" disabled selected>Choisissez un patient</option>
                                @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="date_devis" class="form-label fw-semibold">Date du devis</label>
                            <input type="date" name="date_devis" id="date_devis" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="montant" class="form-label fw-semibold">Montant (CFA)</label>
                            <input type="number" name="montant" id="montant" class="form-control" step="0.01" required>
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
