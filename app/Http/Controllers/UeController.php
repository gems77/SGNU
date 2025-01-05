<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use Illuminate\Http\Request;

class UeController extends Controller
{
    //
    public function addUe(Request $request){
        $request->validate([
            "code" => "required",
            "nom" => "required",
            "credits_ects" => "required",
            "semestre" => "required"
        ]);
        $ue = new Ue();
        $ue->code = $request->code;
        $ue->nom = $request->nom;
        $ue->credits_ects = $request->credits_ects;
        $ue->semestre = $request->semestre;
        $ue->save();
        
        $ues = Ue::all();
        return view("ue.action", compact("ues"));
        
        
    }
    
    public function updateUe(Request $request, String $id){
        
        $ue = Ue::find($id);
        if($ue){
            $ue->code = $request->code;
            $ue->nom = $request->nom;
            $ue->credits_ects = $request->credits_ects;
            $ue->semestre = $request->semestre;
            $ue->save();
        }

        return redirect("ue");
    }
    
    public function deleteUe(Request $request, String $id){
        
        $ue = Ue::findOrFail($id);
        if($ue){
            $ue->delete();
        }
        return redirect("ue");
    }
    
    public function getUe(){
        $ues = Ue::all();
        return view("ue.action", compact("ues"));
        
    }
    public function getViewUe(){
        return view("ue.index");
    }
}
