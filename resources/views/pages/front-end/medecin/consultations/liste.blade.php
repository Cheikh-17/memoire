@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des Consultations</h1>

    @if($consultations->isEmpty())
        <p>Aucune consultation trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Motif</th>
                    <th>Diagnostic</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->id }}</td>
                        <td>{{ $consultation->date }}</td>
                        <td>{{ $consultation->heure }}</td>
                        <td>{{ $consultation->motif }}</td>
                        <td>{{ $consultation->diagnostic }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-detail" data-id="{{ $consultation->id }}">detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $consultations->links() }}
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="consultationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consultationModalLabel">Détails de la consultation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <span id="modal-id"></span></p>
        <p><strong>Date:</strong> <span id="modal-date"></span></p>
        <p><strong>Heure:</strong> <span id="modal-heure"></span></p>
        <p><strong>Motif:</strong> <span id="modal-motif"></span></p>
        <p><strong>Diagnostic:</strong> <span id="modal-diagnostic"></span></p>
        <hr>
        <h5>Informations du patient</h5>
        <p><strong>Nom:</strong> <span id="modal-patient-nom"></span></p>
        <p><strong>Prénom:</strong> <span id="modal-patient-prenom"></span></p>
        <p><strong>Email:</strong> <span id="modal-patient-email"></span></p>
        <p><strong>Téléphone:</strong> <span id="modal-patient-telephone"></span></p>
      </div>
      <div class="modal-footer">
        <a href="#" id="btn-ordonnance" class="btn btn-success">Ordonnances</a>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var consultationModal = new bootstrap.Modal(document.getElementById('consultationModal'));
    var currentConsultationId = null;
    var currentPatientId = null;

    document.querySelectorAll('.btn-detail').forEach(function(button) {
        button.addEventListener('click', function() {
            var consultationId = this.getAttribute('data-id');
            fetch('/medecin/consultations/showForMedecin/' + consultationId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modal-id').textContent = data.id;
                    document.getElementById('modal-date').textContent = data.date;
                    document.getElementById('modal-heure').textContent = data.heure;
                    document.getElementById('modal-motif').textContent = data.motif;
                    document.getElementById('modal-diagnostic').textContent = data.diagnostic;

                    // Affichage des informations du patient
                    if(data.patient) {
                        document.getElementById('modal-patient-nom').textContent = data.patient.nom || '';
                        document.getElementById('modal-patient-prenom').textContent = data.patient.prenom || '';
                        document.getElementById('modal-patient-email').textContent = data.patient.email || '';
                        document.getElementById('modal-patient-telephone').textContent = data.patient.telephone || '';
                        currentPatientId = data.patient.id;
                    } else {
                        document.getElementById('modal-patient-nom').textContent = '';
                        document.getElementById('modal-patient-prenom').textContent = '';
                        document.getElementById('modal-patient-email').textContent = '';
                        document.getElementById('modal-patient-telephone').textContent = '';
                        currentPatientId = null;
                    }
                    currentConsultationId = consultationId;

                    consultationModal.show();
                })
                .catch(error => {
                    alert('Erreur lors du chargement des détails de la consultation.');
                    console.error(error);
                });
        });
    });

    document.getElementById('btn-retour').addEventListener('click', function() {
        consultationModal.hide();
    });

    document.getElementById('btn-ordonnance').addEventListener('click', function() {
        if(currentConsultationId && currentPatientId) {
            var url = '{{ url('medecin/ordonnances/create') }}' + '?patient_id=' + currentPatientId + '&consultation_id=' + currentConsultationId;
            window.location.href = url;
        } else {
            alert('Informations de consultation ou patient manquantes.');
        }
    });
});
</script>
        <a href="{{ route('medecin.traitements.create') }}" class="btn btn-info">Traitements</a>
        <button type="button" id="btn-retour" class="btn btn-secondary">Retour</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var consultationModal = new bootstrap.Modal(document.getElementById('consultationModal'));

    document.querySelectorAll('.btn-detail').forEach(function(button) {
        button.addEventListener('click', function() {
            var consultationId = this.getAttribute('data-id');
            fetch('/medecin/consultations/showForMedecin/' + consultationId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modal-id').textContent = data.id;
                    document.getElementById('modal-date').textContent = data.date;
                    document.getElementById('modal-heure').textContent = data.heure;
                    document.getElementById('modal-motif').textContent = data.motif;
                    document.getElementById('modal-diagnostic').textContent = data.diagnostic;

                    // Affichage des informations du patient
                    if(data.patient) {
                        document.getElementById('modal-patient-nom').textContent = data.patient.nom || '';
                        document.getElementById('modal-patient-prenom').textContent = data.patient.prenom || '';
                        document.getElementById('modal-patient-email').textContent = data.patient.email || '';
                        document.getElementById('modal-patient-telephone').textContent = data.patient.telephone || '';
                    } else {
                        document.getElementById('modal-patient-nom').textContent = '';
                        document.getElementById('modal-patient-prenom').textContent = '';
                        document.getElementById('modal-patient-email').textContent = '';
                        document.getElementById('modal-patient-telephone').textContent = '';
                    }

                    consultationModal.show();
                })
                .catch(error => {
                    alert('Erreur lors du chargement des détails de la consultation.');
                    console.error(error);
                });
        });
    });

    document.getElementById('btn-retour').addEventListener('click', function() {
        consultationModal.hide();
    });
});
</script>
@endsection
