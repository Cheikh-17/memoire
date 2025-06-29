 @extends('app1')

@section('content')

<div class="container">
    <h1>Liste des secrétaires</h1>
    @if($secretaires->isEmpty())
        <p>Aucun secrétaire trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($secretaires as $secretaire)
                
                <tr>
                    <td>{{ $secretaire->nom }}</td>
                    <td>{{ $secretaire->prenom }}</td>
                    <td>{{ $secretaire->email }}</td>
                    <td>{{ $secretaire->telephone }}</td>
                    <td>{{ $secretaire->adresse }}</td>
                    <td>
                        <a href="{{ route('secretaire.show', $secretaire->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('secretaire.edit', $secretaire->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('secretaire.destroy', $secretaire->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce secrétaire ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection