<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use App\Models\Ue;
use Illuminate\Http\Request;

class EcController extends Controller
{
    public function addEc(Request $request){
        $request->validate([
            "code" => "required",
            "nom" => "required",
            "coefficient" => "required",
            "ue_id" => "required"
        ]);
        $ec = new Ec();
        $ec->code = $request->code;
        $ec->nom = $request->nom;
        $ec->coefficient = $request->coefficient;
        $ec->ue_id = $request->ue_id;
        $ec->save();
        $ecs = Ec::all();
        $ues = Ue::all();
        return view("ec.action", compact("ecs","ues"));
        
    }
    
    public function updateEc(Request $request, String $id){
        //dd($id);
        $ec = Ec::find($id);
        
        if($ec){
            $ec->code = $request->code;
            $ec->nom = $request->nom;
            $ec->coefficient = $request->coefficient;
            $ec->ue_id = $request->ue_id;
            $ec->save();
        }

        return redirect("ec");
    }
    
    public function deleteEc(String $id){
        
        $ec = Ec::findOrFail($id);
        if($ec){
            $ec->delete();
        }
        return redirect("ec");
    }
    
    public function getEc(){
        
        $ecs = Ec::all();
        $ues = Ue::all();
        return view("ec.action", compact("ecs", "ues"));
        
    }
    
    public function getViewEc(){
        $ues = Ue::all();
        return view("ec.index", compact("ues"));
        
    }
}