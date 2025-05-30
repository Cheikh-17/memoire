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
                            <a href="{{ route('medecin.consultations.show', $consultation->id) }}" class="btn btn-primary btn-sm">detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
