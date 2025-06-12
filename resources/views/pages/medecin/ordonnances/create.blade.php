@extends('app1')

@section('content')
<div class="container">
    <h1>Créer une nouvelle ordonnance</h1>

    <form action="{{ route('medecin.ordonnances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="patient_id" class="form-label">Patient</label>
            <select class="form-select" id="patient_id" name="patient_id" required>
                <option value="">Sélectionnez un patient</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }} ({{ $patient->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="consultation_id" class="form-label">Consultation</label>
            <select class="form-select" id="consultation_id" name="consultation_id" required>
                <option value="">Sélectionnez une consultation</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

<script>
document.getElementById('patient_id').addEventListener('change', function() {
    var patientId = this.value;
    var consultationSelect = document.getElementById('consultation_id');
    consultationSelect.innerHTML = '<option value="">Chargement...</option>';

    if (!patientId) {
        consultationSelect.innerHTML = '<option value="">Sélectionnez une consultation</option>';
        return;
    }

    fetch('/medecin/api/patients/' + patientId + '/consultations', {
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        consultationSelect.innerHTML = '<option value="">Sélectionnez une consultation</option>';
        data.forEach(function(consultation) {
            var option = document.createElement('option');
            option.value = consultation.id;
            option.text = 'Consultation #' + consultation.id + ' - ' + consultation.date;
            consultationSelect.appendChild(option);
        });
    })
    .catch(error => {
        consultationSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
        console.error('Erreur:', error);
    });
});
</script>
@endsection
