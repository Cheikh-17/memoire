@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer une nouvelle facture</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('factures.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="idUser" class="form-label fw-semibold">Patient</label>
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
                            <label for="consultation_id" class="form-label fw-semibold">Consultation</label>
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
                            <label for="date-emission" class="form-label fw-semibold">Date d'émission</label>
                            <input type="date" name="date-emission" id="date-emission" class="form-control" required value="{{ old('date-emission', $date_emission) }}">
                        </div>

                        <div class="mb-3">
                            <label for="montant" class="form-label fw-semibold">Montant (CFA)</label>
                            <input type="number" step="0.01" name="montant" id="montant" class="form-control" required value="{{ old('montant', $montant) }}">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Créer la facture</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
