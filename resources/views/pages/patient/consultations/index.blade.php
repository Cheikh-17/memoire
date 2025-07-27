@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Consultations</h1>

    {{-- Formulaire de recherche --}}
    <form method="GET" action="{{ route('consultations.index') }}" class="mb-3 d-flex justify-content-end" style="max-width: 300px; margin-left: auto;">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher..." value="{{ isset($search) ? $search : '' }}">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

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
                        <a href="{{ route('consultations.show', $consultation->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
