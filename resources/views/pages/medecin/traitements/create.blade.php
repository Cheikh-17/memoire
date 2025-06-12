@extends('app1')

@section('content')
<div class="container">
    <h1>Créer un nouveau traitement</h1>

    <form action="{{ route('medecin.traitements.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="consultation_id" class="form-label">Consultation</label>
            <select class="form-select" id="consultation_id" name="consultation_id" required>
                @foreach($consultations as $consultation)
                    <option value="{{ $consultation->id }}">Consultation #{{ $consultation->id }} - {{ $consultation->date }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea class="form-control" id="observation" name="observation" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
