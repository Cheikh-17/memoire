@extends('app1')
@section('content')
<div class="container">
    <h1>Liste des médecins</h1>
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
                        <a href="{{ route('medecin.show', $medecin->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('medecin.edit', $medecin->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('medecin.destroy', $medecin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médecin ?')">Supprimer</button>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection