<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    const UPDATED_AT = null;

    public function equipo(){
        return $this->hasOne(Equipo::class,"id_eq","equipo_re");
    }
}
