@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="row">
                <div class="col-8">
                    <h1 class="display-one">Liste des étudiants</h1>
                    <p>Collège Maisonneuve - groupe 20632</p>
                </div>
                <div class="col-4 mt-5 text-center">
                    <!-- etudiant.create qui est définie dans le fichier web.php -->
                    <a href="{{ route('etudiant.create')}}" class="btn btn-primary btn-sm">Ajouter un étudiant</a>
                </div>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Ville</th>
                </tr>
                @forelse($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id}}</td>
                    <!-- <td><a href="etudiants/{{$etudiant->id}}">{{ $etudiant->nom }}</a></td> -->
                    <td><a href="{{ route('etudiant.show',$etudiant->id)}}">{{ $etudiant->nom }}</a></td>
                    <td>{{ $etudiant->adresse }}</td>
                    <td>{{ $etudiant->phone }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->date_naissance }}</td>
                    <td>{{ $etudiant->ville_id }}</td>
                </tr>
                @empty
                <tr class="text-warning">Aucun étudiant/étudiante trouvé(e).</tr>
                @endforelse


            </table>


        </div>
    </div>

</div>

@endsection