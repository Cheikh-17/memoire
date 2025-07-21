@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer une nouvelle consultation</h4>
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

                    <form action="{{ route('medecin.consultations.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="idUser" class="form-label fw-semibold">Patient</label>
                            <select name="idUser" id="idUser" class="form-select" required>
                                <option value="">Sélectionnez un patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ old('idUser') == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->nom }} {{ $patient->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="diagnostic" class="form-label fw-semibold">Diagnostic</label>
                            <input type="text" name="diagnostic" id="diagnostic" class="form-control" value="{{ old('diagnostic') }}">
                        </div>

                        <div class="mb-3">
                            <label for="motif" class="form-label fw-semibold">Motif</label>
                            <input type="text" name="motif" id="motif" class="form-control" value="{{ old('motif') }}">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="date" class="form-label fw-semibold">Date de la consultation</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="heure" class="form-label fw-semibold">Heure</label>
                                <input type="time" name="heure" id="heure" class="form-control" value="{{ old('heure') }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
