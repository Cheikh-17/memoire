@extends('app1')

@section('content')
<div class="container">
    <h1>Créer une nouvelle facture</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('factures.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="idUser" class="form-label">Patient</label>
            <select name="idUser" id="idUser" class="form-select" required>
                <option value="">Sélectionnez un patient</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $idUser ? 'selected' : '' }}>{{ $user->nom }} {{ $user->prenom }}</option>
                @endforeach
            </select>
        </div>

        <script>
            document.getElementById('idUser').addEventListener('change', function() {
                var selectedUser = this.value;
                var url = new URL(window.location.href);
                if(selectedUser) {
                    url.searchParams.set('idUser', selectedUser);
                } else {
                    url.searchParams.delete('idUser');
                }
                window.location.href = url.toString();
            });
        </script>

        <div class="mb-3">
            <label for="consultation_id" class="form-label">Consultation</label>
            <select name="consultation_id" id="consultation_id" class="form-select" required>
                <option value="">Sélectionnez une consultation</option>
                @foreach($consultations as $consultation)
                    <option value="{{ $consultation->id }}">
                        {{ $consultation->date }} - {{ $consultation->motif }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="date-emission" class="form-label">Date d'émission</label>
            <input type="date" name="date-emission" id="date-emission" class="form-control" required value="{{ old('date-emission', $date_emission) }}">
        </div>

        <div class="mb-3">
            <label for="montant" class="form-label">Montant (CFA)</label>
            <input type="number" step="0.01" name="montant" id="montant" class="form-control" required value="{{ old('montant', $montant) }}">
        </div>

        <button type="submit" class="btn btn-primary">Créer la facture</button>
    </form>
</div>
@endsection
 
