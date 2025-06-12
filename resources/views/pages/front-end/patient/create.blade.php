{{-- filepath: resources/views/pages/front-end/patient/create.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    body {
        background: url("{{ asset('img/image.jpeg') }}") no-repeat center center fixed;
        background-size: cover;
    }
    .form-container {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        max-width: 420px;
        margin: 48px auto;
        padding: 32px 36px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .form-container h1 {
        color:vert #1e90ff;
        font-weight: bold;
        margin-bottom: 24px;
        letter-spacing: 1px;
        text-align: center;
    }
    .form-group {
        width: 100%;
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        color: #2d3748;
        margin-bottom: 6px;
        letter-spacing: 0.5px;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1.5px solid #1e90ff;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
        color: #222;
        background: #f0f8ff;
        outline: none;
        transition: border-color 0.2s;
    }
    .form-group input:focus,
    .form-group select:focus {
        border-color: #00bcd4;
        background: #e3f2fd;
    }
    button[type="submit"] {
        width: 100%;
        padding: 12px 0;
        background: #1e90ff;
        color: #fff;
        font-size: 1.1rem;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        letter-spacing: 1px;
        box-shadow: 0 2px 8px rgba(30,144,255,0.08);
        transition: background 0.2s;
    }
    button[type="submit"]:hover {
        background: #00bcd4;
    }
</style>
<div class="form-container">
    <h1>Créer un patient</h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="text" name="telephone" id="telephone" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" required>
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de naissance :</label>
            <input type="date" name="date_naissance" id="date_naissance" required>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select name="sexe" id="sexe" required>
                <option value="">Sélectionner</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Autre">Autre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="historique_dentaire">Historique dentaire :</label>
            <textarea name="historique_dentaire" id="historique_dentaire" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="allergies">Allergies :</label>
            <textarea name="allergies" id="allergies" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="traitements_en_cours">Traitements en cours :</label>
            <textarea name="traitements_en_cours" id="traitements_en_cours" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="observations">Observations :</label>
            <textarea name="observations" id="observations" rows="3"></textarea>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>
@endsection