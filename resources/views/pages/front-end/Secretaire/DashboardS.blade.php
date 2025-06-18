{{-- @extends('pages.front-end.Secretaire.DashboardSecretaire')
@section('content') --}}
    {{-- {{-- <!-- [ Main Content ] start --> --}}
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Home</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Home</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- Bloc : Créer dossier et compte patient -->
          <div class="col-md-4 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
              <div class="card-body text-center">
                <img src="{{asset('../assets/images/widget/img-status-4.svg')}}" alt="img" class="img-fluid img-bg mb-3">
                <h5 class="mb-3">Créer dossier & compte patient</h5>
                <p class="text-muted mb-3">Enregistrez un nouveau patient et créez son compte pour accéder à ses informations médicales.</p>
                <a href="{{ route('formPatient') }}" class="btn btn-primary">Nouveau patient</a>
              </div>
            </div>
          </div>
          <!-- Bloc : Gérer factures et paiements -->
          <div class="col-md-4 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
              <div class="card-body text-center">
                <img src="{{asset('../assets/images/widget/img-status-5.svg')}}" alt="img" class="img-fluid img-bg mb-3">
                <h5 class="mb-3">Factures & Paiements</h5>
                <p class="text-muted mb-3">Gérez les factures des patients, suivez les paiements et reliez-les à chaque dossier.</p>
                <a href="#" class="btn btn-success">Voir les factures</a>
              </div>
            </div>
          </div>
          <!-- Bloc : Créer un devis pour patient -->
          <div class="col-md-4 col-sm-12">
            <div class="card statistics-card-1 overflow-hidden bg-brand-color-3">
              <div class="card-body text-center">
                <img src="{{asset('../assets/images/widget/img-status-6.svg')}}" alt="img" class="img-fluid img-bg mb-3">
                <h5 class="mb-3 text-white">Créer un devis</h5>
                <p class="text-white text-opacity-75 mb-3">Établissez un devis pour un patient avant la réalisation des soins.</p>
                <a href="{{ route('devis.create') }}" class="btn btn-light">Nouveau devis</a>
              </div>
            </div>
          </div>
        </div>
        {{-- filepath: resources/views/pages/front-end/Secretaire/DashboardSecretaire.blade.php --}}


<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Consultations du jour</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead> 
                            <tr>
                                <th>Heure</th>
                                <th>Patient</th>
                                <th>Médecin</th>
                                <th>Motif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($consultations as $consultation)
                                <tr>
                                    <td>{{ $consultation->heure }}</td>
                                    <td>{{ $consultation->patient ? $consultation->patient->nom . ' ' . $consultation->patient->prenom : 'N/A' }}</td>
                                    <td>{{ $consultation->medecin && $consultation->medecin->user ? $consultation->medecin->user->nom . ' ' . $consultation->medecin->user->prenom : 'N/A' }}</td>
                                    <td>{{ $consultation->motif }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Aucune consultation prévue aujourd'hui.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 
{{-- @endsection --}}