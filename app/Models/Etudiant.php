<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $table = "etudiants";
    protected $fillable=[
        "numero_etudiant",
        "nom",
        "prenom",
        "niveau"
    ];
    
    public static function generateNumeroEtudiant()
    {
        do {
            $numero = str_pad(random_int(1, 99999999), 8, '0', STR_PAD_LEFT);
        } while (self::where('numero_etudiant', $numero)->exists());

        return $numero;
    }
    
}
