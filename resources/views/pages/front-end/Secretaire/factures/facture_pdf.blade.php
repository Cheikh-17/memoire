<div style="font-family: DejaVu Sans, sans-serif; padding: 20px; position: relative;">

    {{-- Logo et contact du cabinet en haut à droite --}}
    <div style="position: absolute; top: 20px; right: 20px; text-align: right;">
        <img src="{{ $cabinet['logo'] }}" alt="Logo Cabinet" style="max-width: 120px; height: auto; margin-bottom: 10px;">
        <div style="font-size: 10px; line-height: 1.2;">
            <div><strong>{{ $cabinet['nom'] }}</strong></div>
            <div>Téléphone : {{ $cabinet['telephone'] }}</div>
            <div>Email : {{ $cabinet['email'] }}</div>
            {{-- <div>Adresse : {{ $cabinet['adresse'] }}</div> --}}
        </div>
    </div>

    <h1>Facture {{ $facture->id }}</h1>

    <div>
        <strong>Numéro de paiement :</strong> {{ $facture->id }}<br>
        <strong>Montant :</strong> {{ number_format($facture->montant, 2) }} CFA<br>
        <strong>Date d'émission :</strong> {{ $facture->created_at->format('d/m/Y') }}<br>
    </div>

    <h2>Patient</h2>
    <div>
        <strong>Nom :</strong> {{ $facture->user->nom }} {{ $facture->user->prenom }}<br>
        <strong>Email :</strong> {{ $facture->user->email }}<br>
        <strong>Adresse :</strong> {{ $facture->user->adresse }}<br>
        <strong>Téléphone :</strong> {{ $facture->user->telephone }}<br>
    </div>

    <h2>Consultation</h2>
    <div>
        <strong>Date :</strong> {{ $facture->consultation->date }}<br>
        <strong>Heure :</strong> {{ $facture->consultation->heure }}<br>
        <strong>Motif :</strong> {{ $facture->consultation->motif }}<br>
        <strong>Diagnostic :</strong> {{ $facture->consultation->diagnostic }}<br>
    </div>

    {{-- <h2>Médecin</h2>
    <div>
        @if($facture->consultation && $facture->consultation->medecin)
            <strong>Nom :</strong> {{ $facture->consultation->medecin->nom }} {{ $facture->consultation->medecin->prenom }}<br>
            <strong>Email :</strong> {{ $facture->consultation->medecin->email }}<br>
            <strong>Téléphone :</strong> {{ $facture->consultation->medecin->telephone }}<br>
        @else
            <strong>Informations médecin non disponibles</strong><br>
        @endif
    </div> --}}

    <h2>Secrétaire</h2>
    <div>
        <strong>Nom :</strong> {{ $secretaire->nom }} {{ $secretaire->prenom }}<br>
        <strong>Email :</strong> {{ $secretaire->email }}<br>
        <strong>Téléphone :</strong> {{ $secretaire->telephone }}<br>
    </div>
</div>
