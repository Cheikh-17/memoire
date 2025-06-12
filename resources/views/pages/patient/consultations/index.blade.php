@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Consultations</h1>
    @if($consultations->isEmpty())
        <p>Aucune consultation trouvée.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Diagnostic</th>
                    <th>Motif</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->diagnostic }}</td>
                    <td>{{ $consultation->motif }}</td>
                    <td>{{ \Carbon\Carbon::parse($consultation->date)->format('d/m/Y') }}</td>
                    <td>{{ $consultation->heure }}</td>
                    <td>
                        <a href="{{ route('consultations.show', $consultation->id) }}" class="btn btn-primary btn-sm">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
