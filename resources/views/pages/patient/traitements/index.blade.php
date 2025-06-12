@extends('app1')

@section('content')
<div class="container">
    <h1>Liste des traitements</h1>

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
