@extends('app1')

@section('content')
    <style>
        .container {
            margin-top: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            text-align: center;
        }
        .btn {
            margin: 5px;
        }
    </style>
<div class="container">
    <h1>Mes ordonnances</h1>
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
<a href="{{ route('patient.ordonnances.show', $ordonnance->id) }}" class="btn btn-primary">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
