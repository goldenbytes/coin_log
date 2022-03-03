<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $primaryKey       =       "id_eq";
    public $incrementing        =       false;

    public function dueno(){
        return $this->hasOne(Dueno::class,"id_du","propietario_eq");
    }

    public function logs(){
        return $this->hasMany(Registro::class,"equipo_re","id_eq");
    }

    public function planes()
    {
        return $this->belongsToMany(Plan::class,
            'plan_equipo',
            'equipo_pe',
            'plan_pe',
            'id_eq',
            'id_pl')->withTimestamps();
    }

}
