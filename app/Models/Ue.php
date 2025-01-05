<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    use HasFactory;
    protected $table= "ues";

    protected $fillable = ['code', 'nom', 'credits_ects', 'semestre'];

    public function ecs()
    {
        return $this->hasMany(EC::class);
    }
}
