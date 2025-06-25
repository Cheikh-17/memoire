@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des factures</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Date d'émission</th>
                <th>Montant (€)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
            <tr>
                <td>{{ $facture->id }}</td>
                <td>{{ $facture->user->nom ?? 'N/A' }} {{ $facture->user->prenom ?? '' }}</td>
                <td>{{ $facture->created_at->format('d/m/Y') }}</td>
                <td>{{ number_format($facture->montant, 2) }}</td>
                <td>
                    <a href="{{ route('facture.show', $facture->id) }}" class="btn btn-primary btn-sm">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $factures->links() }}
</div>
@endsection
