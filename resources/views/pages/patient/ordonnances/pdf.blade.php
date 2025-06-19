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
    </style>
</head>
<body>
    <h1>Ordonnance</h1>
    <div class="client-info">
        <h2>Informations du client</h2>
        <p><strong>Nom :</strong> {{ $user->nom }}</p>
        <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Adresse :</strong> {{ $user->adresse }}</p>
        <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
    </div>
    <div class="content">
        {!! nl2br(e($content)) !!}
    </div>
</body>
</html>
