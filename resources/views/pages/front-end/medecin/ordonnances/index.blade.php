@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des ordonnances</h1>

    <form method="GET" action="{{ route('medecin.ordonnances.index') }}" class="mb-3 d-flex justify-content-end" style="max-width: 300px; margin-left: auto;">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher une ordonnance..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

    @if($ordonnances->isEmpty())
        <p>Aucune ordonnance trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordonnances as $ordonnance)
                <tr>
                    <td>{{ $ordonnance->id }}</td>
                    <td>{{ $ordonnance->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('medecin.ordonnances.showMedecin', $ordonnance->id) }}" class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i> 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ordonnances->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    @endif
</div>
@endsection
