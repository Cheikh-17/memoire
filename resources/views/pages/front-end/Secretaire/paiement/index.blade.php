@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des paiements</h1>

    <a href="{{ route('paiement.create') }}" class="btn btn-primary mb-3">Nouveau paiement</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Numéro de paiement</th>
                <th>Date de paiement</th>
                <th>Montant (CFA)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paiements as $paiement)
            <tr>
                <td>{{ $paiement->id }}</td>
                <td>{{ $paiement->user->nom ?? 'N/A' }} {{ $paiement->user->prenom ?? '' }}</td>
                <td>{{ $paiement->{'numero-paiement'} }}</td>
                <td>{{ \Carbon\Carbon::parse($paiement->{'date-paiement'})->format('d/m/Y') }}</td>
                <td>{{ number_format($paiement->montant, 2) }}</td>
                <td>
                    <a href="{{ route('paiement.show', $paiement->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('paiement.edit', $paiement->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{ route('paiement.destroy', $paiement->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $paiements->links() }}
</div>
@endsection
