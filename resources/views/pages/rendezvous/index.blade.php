@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff; display: flex; align-items: center;">
                    <i class="bi bi-calendar-check me-2"></i>
                    <h3 class="mb-0">Mes rendez-vous</h3>
                </div>
                <div class="card-body bg-light">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($rendezvous->isEmpty())
                        <div class="alert alert-info text-center">
                            Vous n'avez aucun rendez-vous.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Médecin</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure</th>
                                        <th scope="col">Type de soins</th>
                                        <th scope="col">Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rendezvous as $rdv)
                                        <tr>
                                            <td>
                                                <span class="fw-semibold">
                                                    {{ $rdv->medecin ? $rdv->medecin->user->nom . ' ' . $rdv->medecin->user->prenom : 'N/A' }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($rdv->{'date-rendez-vous'})->format('d/m/Y') }}</td>
                                            <td>{{ $rdv->{'heure-rendez-vous'} }}</td>
                                            <td>{{ $rdv->{'type-de-soins'} }}</td>
                                            <td>
                                                @if($rdv->status === 'confirmé' || $rdv->status === 'confirmer')
                                                    <span class="badge bg-success">Confirmé</span>
                                                @elseif($rdv->status === 'annulé' || $rdv->status === 'annuler')
                                                    <span class="badge bg-danger">Annulé</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($rdv->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
