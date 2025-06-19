@extends('app1')

@section('content')
<div class="container mt-4">
    <h2>Créer une nouvelle consultation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medecin.consultations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idUser" class="form-label">Patient</label>
            <select class="form-select" id="idUser" name="idUser" required>
                <option value="">Sélectionnez un patient</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ old('idUser') == $patient->id ? 'selected' : '' }}>
                        {{ $patient->nom }} {{ $patient->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="diagnostic" class="form-label">Diagnostic</label>
            <input type="text" class="form-control" id="diagnostic" name="diagnostic" value="{{ old('diagnostic') }}">
        </div>

        <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <input type="text" class="form-control" id="motif" name="motif" value="{{ old('motif') }}">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date de la consultation</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" class="form-control" id="heure" name="heure" value="{{ old('heure') }}">
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
