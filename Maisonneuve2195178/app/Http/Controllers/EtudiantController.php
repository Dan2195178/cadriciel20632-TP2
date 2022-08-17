<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // URL: http://127.0.0.1:8000/etudiants
        $etudiants = Etudiant::all(); // Appel de la mèthode all() qui fait partie du Modèle 'Etudiant', équivalent de clause ---SELECT * FROM etudiants
       
        return  view('etudiant.index', [
            'etudiants' => $etudiants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   // récupérer tous les villes stockées dans la base de donnée en utilisant Models/Ville.php
        $villes = Ville::all();
        //pointer vers le fichier 'resources/views/etudiant/create.blade.php'
        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;      // équivalent de $_POST de ce qu'on lui envoie par le formulaire les saisies ex: [_token:""  nom: "abc" adresse: "" ....]
        //tableau           Models/Etudiant
        $nouveauEtudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id

        ]);

        return redirect(route('etudiant.show', $nouveauEtudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
       
        // $etudiant = 1, 'SELECT * FROM etudiants WHERE id = 1', retourner un enregistrement de la table qui réponde à la condition 'where'
        return view('etudiant.show', [
            'etudiant' => $etudiant
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
     {  
        // récupérer tous les villes stockées dans la base de donnée en utilisant Models/Ville.php
        $villes = Ville::all();
        // pointe vers 'resources/views/etudiant/edit.blade.php'
        return view('etudiant.edit', [
            'etudiant' => $etudiant,
            'villes' => $villes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request - un objet instancié qui représent de nouveau information de cet'étudiant  ($_POST[] transmis à un Objet qui contient des propriétés et des méthodes)
     * @param  \App\Models\Etudiant  $etudiant - un objet instancié qui représent d'ancien information de cet étudiant spécifié
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {   // Méthode d'un objet instancié de la class Etudiant(Models) qui répresent une clause de 'UPDATE FROM etudiants ...'
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect(route('etudiant.edit', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {   
        $etudiant->delete();
        return redirect(route('etudiants'));
    }
}
