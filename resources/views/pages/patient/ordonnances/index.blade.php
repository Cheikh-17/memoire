@extends('app1')

@section('content')
<div class="container">
    <h1>Mes ordonnances</h1>

    <form method="GET" action="{{ route('patient.ordonnances.index') }}" class="mb-3 d-flex justify-content-end" style="max-width: 300px; margin-left: auto;">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher une ordonnance..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

    @if($ordonnances->isEmpty())
        <p>Vous n'avez aucune ordonnance pour le moment.</p>
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
                        {{-- @php $user = auth()->user(); @endphp --}}
                        {{-- @if($user->profil === 'MEDECIN')
                            <a href="{{ route('medecin.ordonnances.show', $ordonnance->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        @else --}}
                            <a href="{{ route('patient.ordonnances.show', $ordonnance->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        {{-- @endif --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ordonnances->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    @endif
</div>
@endsection
