<?php

namespace App\Models;

use App\Events\ComandoEquipo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comando extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = "id_co";
    public $incrementing = false;

    protected $appends = ['duracion_co', 'ejecutado_co'];

    protected $casts = [
        'exito_co' => 'boolean',
    ];

    protected $dispatchesEvents = [
        'created' => ComandoEquipo::class,
    ];

    public function getDuracionCoAttribute()
    {
        $t1 = Carbon::parse($this->created_at);
        $t2 = Carbon::parse($this->updated_at);
        $diff = $t1->diff($t2);
        return $diff->s;
    }

    public function getEjecutadoCoAttribute()
    {
        return $this->created_at === $this->updated_at;
    }
}
