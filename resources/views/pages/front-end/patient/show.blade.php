@extends('app1')

@section('content')
<div class="container">
    <h1>Détails du patient</h1>
    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <td>{{ $patient->nom }}</td>
        </tr>
        <tr>
            <th>Prénom</th>
            <td>{{ $patient->prenom }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $patient->email }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $patient->telephone }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $patient->adresse }}</td>
        </tr>
    </table>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Retour à la liste</a>
    
    @auth
        @if(auth()->user()->profil === 'MEDECIN')
            <a href="{{ route('fiche-medicale', $patient->id) }}" class="btn btn-primary">fiche medicale</a>
        @endif
    @endauth
</div>
@endsection
