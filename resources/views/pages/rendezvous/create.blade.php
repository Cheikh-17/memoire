@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Donner un rendez-vous</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
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

                    <form action="{{ route('rendezvous.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="idUser" class="form-label fw-semibold">Patient</label>
                            <select name="idUser" id="idUser" class="form-select" required>
                                <option value="">Sélectionnez un patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="idMedecin" class="form-label fw-semibold">Médecin</label>
                            <select name="idMedecin" id="idMedecin" class="form-select" required>
                                <option value="">Sélectionnez un médecin</option>
                                @foreach ($medecins as $medecin)
                                    <option value="{{ $medecin->id }}">{{ $medecin->nom }} {{ $medecin->prenom }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="date-rendez-vous" class="form-label fw-semibold">Date</label>
                                <input type="date" name="date-rendez-vous" id="date-rendez-vous" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="heure-rendez-vous" class="form-label fw-semibold">Heure</label>
                                <input type="time" name="heure-rendez-vous" id="heure-rendez-vous" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="type-de-soins" class="form-label fw-semibold">Type de soins</label>
                            <input type="text" name="type-de-soins" id="type-de-soins" class="form-control" required placeholder="Ex: Consultation, traitement...">
                        </div>

                        <div class="mb-3">
                            <label for="idMedecin" class="form-label fw-semibold">Médecin</label>
                            <select name="idMedecin" id="idMedecin" class="form-select" required>
                                <option value="">Sélectionnez un médecin</option>
                                @foreach ($medecins as $medecin)
                                    <option value="{{ $medecin->id }}">{{ $medecin->nom }} {{ $medecin->prenom }} - {{ $medecin->specialite }}</option>
                                @endforeach
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
