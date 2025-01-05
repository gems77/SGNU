<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function addEtudiant(Request $request){
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "niveau" => "required"
        ]);
        $etudiant = new Etudiant();
        $etudiant->numero_etudiant = Etudiant::generateNumeroEtudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->niveau = $request->niveau;
        $etudiant->save();
        
        $etudiants= Etudiant::all();
        return view("etudiant.action", compact("etudiants"));
        
    }
    
    public function updateEtudiant(Request $request, String $id){
        
        $etudiant = etudiant::find($id);
        if($etudiant){
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->niveau = $request->niveau;
            $etudiant->save();
        }

        return redirect("etudiant");
    }
    
    public function deleteEtudiant(Request $request, String $id){
        
        $etudiant = etudiant::findOrFail($id);
        if($etudiant){
            $etudiant->delete();
        }
        return redirect("etudiant");
    }
    
    public function getEtudiant(){
        $etudiants= Etudiant::all();
        return view("etudiant.action", compact("etudiants"));
        
    }
    
    public function getViewEtudiant(){
        return view("etudiant.index");
    }
}
