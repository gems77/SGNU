<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table= "notes";
    protected $fillable = [
        "ec_id",
        "note",
        "etudiant_id",
        "session",
        "date_evaluation",
    ];
    
    public function ec()
    {
        return $this->belongsTo(Ec::class, "ec_id","id");
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, "etudiant_id","id");
    }

}
