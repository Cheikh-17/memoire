@extends('app1')
@section('content')
<div class="container">
    <h1>Liste des médecins</h1>

    <form method="GET" action="{{ route('medecin.index') }}" class="mb-3 d-flex justify-content-end" style="max-width: 300px; margin-left: auto;">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher un médecin..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

    @if($medecins->isEmpty())
        <p>Aucun médecin trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Spécialité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medecins as $medecin)
                 
                <tr>
                    <td>{{ $medecin->user->nom ?? '' }}</td>
                    <td>{{ $medecin->user->prenom ?? '' }}</td>
                    <td>{{ $medecin->user->email ?? '' }}</td>
                    <td>{{ $medecin->user->telephone ?? '' }}</td>
                    <td>{{ $medecin->user->adresse ?? '' }}</td>
                    <td>{{ $medecin->specialite }}</td>
                    <td>
                        <a href="{{ route('medecin.show', $medecin->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('medecin.edit', $medecin->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('medecin.destroy', $medecin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médecin ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{ $medecins->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    @endif
</div>
@endsection