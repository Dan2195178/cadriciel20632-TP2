@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-5 pb-5">
            <a href="{{ route('etudiants') }}" class="btn btn-outline-primary btn-sm">Retourner</a>
            <h1 class="mt-5">Modifier un étudiant</h1>
            <div class="card mt-5">
                <div class="card-header">
                    Informations
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" value="{{ $etudiant->nom }}" class="form-control mb-2">
                            </div>
                            <div class="control-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" value="{{ $etudiant->adresse }}" class="form-control mb-2">
                            </div>
                            <div class="control-group">
                                <label for="phone">Téléphone</label>
                                <input type="text" name="phone" id="phone" value="{{ $etudiant->phone }}" class="form-control mb-2">
                            </div>
                            <div class="control-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ $etudiant->email }}" class="form-control mb-2" placeholder="name@example.com">
                            </div>
                            <div class="control-group">
                                <label for="date_naissance">Date De Naissance</label>
                                <input type="text" name="date_naissance" id="date_naissance" value="{{ $etudiant->date_naissance }}"  class="form-control mb-2" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="control-group">
                                <label for="ville_id">ville</label>
                                <select class="form-select mb-2" name="ville_id" id="ville_id" aria-label="Default select example">
                                    <option selected>Choisir une ville</option>
                                    @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}" @if ($etudiant->ville_id == $ville->id) selected  @endif>{{$ville->nom}}</option>
                                    @endforeach
                                </select>
                
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-2" value="Envoyer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection