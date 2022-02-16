<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    use HasFactory;

    protected $primaryKey       =       "id_du";

    public function equipos(){
        return $this->hasMany(Equipo::class,"propietario_eq","id_du");
    }
}
