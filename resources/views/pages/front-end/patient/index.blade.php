@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des patients</h1>
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
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->nom }}</td>
                <td>{{ $patient->prenom }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->telephone }}</td>
                <td>{{ $patient->adresse }}</td>
                <td>
                    
                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    @auth
                        
                    
                    @if(auth()->user()->profil !== 'MEDECIN' && auth()->user()->profil !== 'SECRETAIRE')
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    @endif
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $patients->links() }}
</div>
@endsection
