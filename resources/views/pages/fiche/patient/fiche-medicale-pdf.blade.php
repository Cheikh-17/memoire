<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Médicale - PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .patient-info, .consultations {
            margin-bottom: 20px;
        }
        .consultation {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .traitements {
            margin-left: 20px;
        }
        .traitement {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <style>
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
    <div class="cabinet-info">
        <img src="{{ $cabinet['logo'] }}" alt="Logo Cabinet" >
        <div><strong>{{ $cabinet['nom'] }}</strong></div>
        <div>Téléphone : {{ $cabinet['telephone'] }}</div>
        <div>Email : {{ $cabinet['email'] }}</div>
    </div>
    <h1>Fiche Médicale</h1>
    <div class="patient-info">
        <h2>Informations du patient</h2>
        <p><strong>Nom :</strong> {{ $user->nom }}</p>
        <p><strong>Prénom :</strong> {{ $user->prenom ?? '' }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Téléphone :</strong> {{ $user->telephone ?? '' }}</p>
        <p><strong>Adresse :</strong> {{ $user->adresse ?? '' }}</p>
    </div>

    <div class="consultations">
        <h2>Consultations</h2>
        @foreach($consultations as $consultation)
            <div class="consultation">
                <p><strong>Date :</strong> {{ $consultation->created_at->format('d/m/Y') }}</p>
                <p><strong>Motif :</strong> {{ $consultation->motif ?? 'N/A' }}</p>
                <p><strong>Traitements :</strong></p>
                <div class="traitements">
                    @foreach($consultation->traitements as $traitement)
                        <div class="traitement">
                            - {{ $traitement->description ?? 'N/A' }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>