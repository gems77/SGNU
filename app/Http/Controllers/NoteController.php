<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\Note;
use App\Models\Ec;
use App\Models\Ue;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function addNote(Request $request){
        $request->validate([
            "ec_id" => "required",
            "note" => "required",
            "etudiant_id" => "required",
            "session" => "required",
            "date_evaluation" => "required"
        ]);
        $note = new Note();
        $note->ec_id = $request->ec_id;
        $note->note = $request->note;
        $note->session = $request->session;
        $note->date_evaluation = $request->date_evaluation;
        $note->etudiant_id = $request->etudiant_id;
        $note->save();
        
        return redirect("note");
    }
    
    public function updateNote(Request $request, String $id){
        
        $note = Note::find($id);
        if($note){
            $note->ec_id = $request->ec_id;
            $note->note = $request->note;
            $note->session = $request->session;
            $note->date_evaluation = $request->date_evaluation;
            $note->etudiant_id = $request->etudiant_id;
            $note->save();
        }

        return redirect("note");
    }
    
    public function deleteNote(Request $request, String $id){
        
        $note = Note::findOrFail($id);
        if($note){
            $note->delete();
        }
        return redirect("note");
    }
    
    public function getNote(){
        
        $notes = Note::all();
        $ecs = Ec::all();
        $etudiants = Etudiant::all();
        return view("note.action", compact("ecs","notes","etudiants"));
        
    }
    
    public function getViewNote(){
        $ecs = Ec::all();
        $etudiants = Etudiant::all();
        return view("note.index", compact("ecs","etudiants"));
        
    }

    
    public function getViewResultat()
    {

        $etudiants = Etudiant::all();

        $resultatsEtudiants = [];
    
        foreach ($etudiants as $etudiant) {
          
            $ues = Ue::join('ecs', 'ues.id', '=', 'ecs.ue_id')
                ->join('notes', 'ecs.id', '=', 'notes.ec_id')
                ->where('notes.etudiant_id', $etudiant->id)
                ->select('ues.id as ue_id', 'ues.nom as ue_nom', 'ecs.coefficient', 'notes.note')
                ->get();
    
            $resultats = [];
            $resultatFinal = false;
    
            foreach ($ues->groupBy('ue_id') as $ueId => $notes) {
                $sommePonderee = 0;
                $sommeCoefficients = 0;
    
                foreach ($notes as $note) {
                    $sommePonderee += $note->note * $note->coefficient;
                    $sommeCoefficients += $note->coefficient;
                }
    
                $moyenneUE = $sommeCoefficients > 0 ? $sommePonderee / $sommeCoefficients : 0;
                $ueValide = $moyenneUE >= 10;
    
                $resultats[] = [
                    'ue_nom' => $notes->first()->ue_nom,
                    'moyenne' => round($moyenneUE, 2),
                    'resultat' => $ueValide ? 'Validé' : 'Non validé',
                ];
    
                $resultatFinal = $ueValide ? true : false;
                //Je vais revoir l'instruction ternaire puisque $ueValide contient une valeur......
            }
    
            
            $resultatsEtudiants[] = [
                'etudiant' => $etudiant->nom,
                'resultats_ues' => $resultats,
                'resultat_final' => $resultatFinal ? 'Validé' : 'Non validé',
            ];
            
        }
        //dd($resultatsEtudiants);
    
        return view('note.resultat', ['resultatsEtudiants' => $resultatsEtudiants]);
    }
    
    
}
