@extends('layouts.app')

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
    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Modifier</a>
</div>
@endsection
