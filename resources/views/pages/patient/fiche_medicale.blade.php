@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fiche Médicale du Patient</h1>

    <div class="card">
        <div class="card-body">
            <h3>Historique Dentaire</h3>
            <p>{{ $ficheMedicale->historique_dentaire ?? 'Aucune information' }}</p>

            <h3>Allergies</h3>
            <p>{{ $ficheMedicale->allergies ?? 'Aucune information' }}</p>

            <h3>Traitements en cours</h3>
            <p>{{ $ficheMedicale->traitements_en_cours ?? 'Aucune information' }}</p>

            <h3>Observations</h3>
            <p>{{ $ficheMedicale->observations ?? 'Aucune information' }}</p>
        </div>
    </div>
</div>
@endsection
