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

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class,
        'plan_equipo',
        'plan_pe',
        'equipo_pe');
    }
}
