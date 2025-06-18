@extends('pages.front-end.Secretaire.DashboardSecretaire')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Devis PDF</title>
</head>
<body>
    <h1>Devis #{{ $devis->id }}</h1>
    <p><strong>Description :</strong> {{ $devis->description }}</p>
    <p><strong>Coût estimé :</strong> {{ $devis->cout_estimer }} FCFA</p>
    <p><strong>Date :</strong> {{ $devis->created_at->format('d/m/Y') }}</p>
    
</body>
</html>

<form method="POST" action="{{ route('devis.store') }}">
    @csrf
    <!-- tes champs ici -->
</form>

// Dans ta vue Blade, après l'enregistrement réussi
<script>
    alert('Devis enregistré avec succès !');
    // Ou utiliser un modal Bootstrap
    $('#successModal').modal('show');
</script>
@endsection