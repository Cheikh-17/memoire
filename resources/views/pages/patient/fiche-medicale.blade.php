{{-- @extends('app1')

@section('content') --}}
@extends('pages.front-end.patient.DashboardPatient')
    @section('content')
<div class="container mt-4">
    <h2>Fiche Médicale de {{ $user->name }} {{ $user->prenom }}</h2>

    <div class="card mb-4">
        <div class="card-header">
            Informations personnelles
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $user->name }}</p>
            <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
            <p><strong>Adresse :</strong> {{ $user->adresse }}</p>
            {{-- Ajouter d'autres informations personnelles si nécessaire --}}
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Consultations et traitements
        </div>
        <div class="card-body">
            @if($consultations->isEmpty())
                <p>Aucune consultation trouvée.</p>
            @else
                @foreach($consultations as $consultation)
                    <div class="mb-3">
                        <h5>Consultation du {{ \Carbon\Carbon::parse($consultation->date)->format('d/m/Y') }}</h5>
                        <p><strong>Diagnostic :</strong> {{ $consultation->diagnostic ?? 'N/A' }}</p>
                        <p><strong>Motif :</strong> {{ $consultation->motif ?? 'N/A' }}</p>

                        @if($consultation->traitements->isEmpty())
                            <p>Aucun traitement pour cette consultation.</p>
                        @else
                            <ul>
                                @foreach($consultation->traitements as $traitement)
                                    <li>
                                        <strong>Observation :</strong> {{ $traitement->observation }}<br>
                                        <strong>Description :</strong> {{ $traitement->description }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <a href="{{ route('patient.fiche-medicale.pdf') }}" class="btn btn-primary">Télécharger la fiche en PDF</a>
</div>
@endsection
