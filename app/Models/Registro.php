<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    public function equipo(){
        return $this->hasOne(Equipo::class,"id_eq","equipo_re");
    }
}
