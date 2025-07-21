@extends('app1')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background-color: #026952; color: #fff;">
                    <h4 class="mb-0">Créer un nouveau traitement</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
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

                    <form action="{{ route('medecin.traitements.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="consultation_id" class="form-label fw-semibold">Consultation</label>
                            <select class="form-select" id="consultation_id" name="consultation_id" required>
                                @foreach($consultations as $consultation)
                                    <option value="{{ $consultation->id }}">Consultation {{ $consultation->id }} - {{ $consultation->date }} - heure {{ $consultation->heure }} - {{ $consultation->diagnostic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="observation" class="form-label fw-semibold">Observation</label>
                            <textarea class="form-control" id="observation" name="observation" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
