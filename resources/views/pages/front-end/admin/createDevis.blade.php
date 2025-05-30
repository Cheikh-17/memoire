@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 450px; background-color: #f8f9fa; border-radius: 18px;">
            <h1 class="text-center mb-4" style="color: #1e90ff; font-size: 2.5rem; font-weight: bold;">
                Créer un devis
            </h1>
            <form action="{{ route('devis.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="date_devis" class="form-label" style="font-size: 1.2rem; color: #1e90ff;">Date du devis</label>
                    <input type="date" name="date_devis" id="date_devis" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label" style="font-size: 1.2rem; color: #1e90ff;">Description</label>
                    <textarea name="description" id="description" class="form-control form-control-lg" rows="3" style="font-size: 1.1rem;"></textarea>
                </div>

                <div class="mb-4">
                    <label for="montant" class="form-label" style="font-size: 1.2rem; color: #1e90ff;">cout_estimer (CFA)</label>
                    <input type="number" name="montant" id="montant" class="form-control form-control-lg" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="font-size: 1.3rem; background-color: #1e90ff; border: none;">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection
