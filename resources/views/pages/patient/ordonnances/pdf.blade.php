<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ordonnance PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .content {
            white-space: pre-wrap;
        }
        .client-info {
            margin-bottom: 20px;
        }
        .client-info h2 {
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .client-info p {
            margin: 2px 0;
        }
        /* Bloc logo et contact en haut à droite */
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

    <h1>Ordonnance</h1>
    <div class="client-info">
        <h2>Informations du client</h2>
        <p><strong>Nom :</strong> {{ $user->nom }}</p>
        <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Adresse :</strong> {{ $user->adresse }}</p>
        <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
    </div>

    <h1>Contenu</h1>
    <div class="content">
        {!! nl2br(e($content)) !!}
    </div>
</body>
</html>
