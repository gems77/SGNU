<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementConstitutif extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'nom', 'coefficient', 'ue_id'];

    public function uniteEnseignement()
    {
        return $this->belongsTo(UniteEnseignement::class, 'ue_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'ec_id');
    }
}
