@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la consultation #{{ $consultation->id }}</h1>
    <p><strong>Diagnostic :</strong> {{ $consultation->diagnostic }}</p>
    <p><strong>Motif :</strong> {{ $consultation->motif }}</p>
    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($consultation->date)->format('d/m/Y') }}</p>
    <p><strong>Heure :</strong> {{ $consultation->heure }}</p>

    <h3>Traitements</h3>
    @if($consultation->traitements->isEmpty())
        <p>Aucun traitement trouvé.</p>
    @else
        <ul>
            @foreach($consultation->traitements as $traitement)
                <li>
                    <strong>Observation:</strong> {{ $traitement->observation }}<br>
                    <strong>Description:</strong> {{ $traitement->description }}
                </li>
            @endforeach
        </ul>
    @endif

    <h3>Ordonnances</h3>
    @if($consultation->ordonnances->isEmpty())
        <p>Aucune ordonnance trouvée.</p>
    @else
        <ul>
            @foreach($consultation->ordonnances as $ordonnance)
                <li>
                    <a href="{{ route('ordonnances.show', $ordonnance->id) }}">Ordonnance #{{ $ordonnance->id }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('consultations.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
