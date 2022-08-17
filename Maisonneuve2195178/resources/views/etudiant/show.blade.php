@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-5 pb-5">
            <a href="{{ route('etudiants') }}" class="btn btn-outline-primary btn-sm">Retourner</a>

            <div class="row mt-5">
                <h1>L'étudiant(e) numéro {{ $etudiant->id }}</h1>
                <div class="col-12 ">
                    <form action="">
                        <div class="form-group mb-2">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="{{ $etudiant->adresse }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Téléphone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $etudiant->phone }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $etudiant->email }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Date De Naissance</label>
                            <input data-provide="datepicker" type="text" class="form-control" name="date_naissance " value="{{ $etudiant->date_naissance }}">
                        </div>
                        <div class="form-group mb-2">
                            <label>Ville</label>
                            <input type="number" class="form-control" name="ville_id" value="{{ $etudiant->ville_id }}">
                        </div>
                    </form>
                </div>
                <div class="row border border-white mt-5">
                    <div class="col-2 rounded">
                        <a href="{{ route('etudiant.edit',$etudiant->id)}}" class="btn btn-outline-primary">Modifier</a>
                    </div>
                    <div class="col-2 rounded">
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection