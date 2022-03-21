<?php

namespace App\Models;

use App\Events\UpdateEquipoConfig;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipo extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = "id_eq";
    public $incrementing = false;

    public function getConfigAttribute()
    {
        return ([
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'key' => env('PUSHER_APP_KEY'),
        ]);
    }

    protected $dispatchesEvents = [
        'saved' => UpdateEquipoConfig::class,
    ];

    public function dueno()
    {
        return $this->hasOne(Dueno::class, "id_du", "propietario_eq");
    }

    public function logs()
    {
        return $this->hasMany(Registro::class, "equipo_re", "id_eq");
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
