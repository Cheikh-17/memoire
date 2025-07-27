@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des traitements</h1>

    {{-- Formulaire de recherche --}}
    <form method="GET" action="{{ route('traitements.index') }}" class="mb-3 d-flex justify-content-end" style="max-width: 300px; margin-left: auto;">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Rechercher..." value="{{ isset($query) ? $query : '' }}">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

    @if($traitements->isEmpty())
        <p>Aucun traitement trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Consultation ID</th>
                    <th>Observation</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($traitements as $traitement)
                    <tr>
                        <td>{{ $traitement->id }}</td>
                        <td>{{ $traitement->consultation_id }}</td>
                        <td>{{ $traitement->observation }}</td>
                        <td>{{ $traitement->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
