@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer une nouvelle ordonnance</h4>
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

                    <form action="{{ route('medecin.ordonnances.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="patient_id" class="form-label fw-semibold">Patient</label>
                            <select class="form-select" id="patient_id" name="patient_id" required>
                                <option value="">Sélectionnez un patient</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ (isset($patientId) && $patientId == $patient->id) ? 'selected' : '' }}>{{ $patient->nom }} {{ $patient->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="consultation_id" class="form-label fw-semibold">Consultation</label>
                            <select class="form-select" id="consultation_id" name="consultation_id" required>
                                <option value="">Sélectionnez une consultation</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="contenu" class="form-label fw-semibold">Contenu</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var patientSelect = document.getElementById('patient_id');
    var consultationSelect = document.getElementById('consultation_id');
    var preselectedConsultationId = @json($consultationId ?? null);

    function loadConsultations(patientId, preselectId) {
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
                if(preselectId && preselectId == consultation.id) {
                    option.selected = true;
                }
                consultationSelect.appendChild(option);
            });
        })
        .catch(error => {
            consultationSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
            console.error('Erreur:', error);
        });
    }

    patientSelect.addEventListener('change', function() {
        loadConsultations(this.value, null);
    });

    // Charger les consultations si un patient est pré-sélectionné
    if(patientSelect.value) {
        loadConsultations(patientSelect.value, preselectedConsultationId);
    }
});
</script>
@endsection
