<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'planes';

    protected $primaryKey = 'id_pl';

    protected $appends = ['tiempo_dec_pl'];

    public function getTiempoDecPlAttribute()
    {
        $hms = explode(":", $this->tiempo_pl);
        return ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class,
        'plan_equipo',
        'plan_pe',
        'equipo_pe',
            'id_pl',
            'id_eq')->withTimestamps();
    }
}
