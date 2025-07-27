<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 30px; }
        .title { font-size: 24px; font-weight: bold; margin-bottom: 10px; color: #1e90ff; }
        .section { margin-bottom: 15px; }
        .label { font-weight: bold; }
        .cabinet-info {
            position: absolute;
            top: 20px;
            right: 20px;
            text-align: right;
            font-size: 10px;
            line-height: 1.2;
        }
        .cabinet-info img {
            max-width: 120px;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="cabinet-info">
        <img src="{{ $cabinet['logo'] }}" alt="Logo Cabinet" >
        <div><strong>{{ $cabinet['nom'] }}</strong></div>
        <div>Téléphone : {{ $cabinet['telephone'] }}</div>
        <div>Email : {{ $cabinet['email'] }}</div>
    </div>
    <div class="header">
        <h1>Devis</h1>
    </div>
    <div class="content">
        <div class="section">
            <span class="label">Patient :</span> 
            @if($devis->client)
                {{ $devis->client->name }} {{ $devis->client->prenom }}<br>
                <span class="label">Email :</span> {{ $devis->client->email }}<br>
                @if(!empty($devis->client->telephone))
                <span class="label">Téléphone :</span> {{ $devis->client->telephone }}<br>
                @endif
                @if(!empty($devis->client->adresse))
                <span class="label">Adresse :</span> {{ $devis->client->adresse }}<br>
                @endif
            @else
                Patient non trouvé
            @endif
        </div>
        <div class="section">
            <span class="label">Description :</span>
            <p>{{ $devis->description }}</p>
        </div>
        <div class="section">
            <span class="label">Montant estimé :</span> {{ number_format($devis->{"cout-estimer"}, 2, ',', ' ') }} CFA
        </div>
        <div class="section">
            <span class="label">Date de création :</span> {{ $devis->created_at->format('d/m/Y') }}
        </div>
    </div>
</body>
</html>
