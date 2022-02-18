<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePlanEquipo;
use App\Http\Requests\StorePlanEquipo;
use App\Http\Requests\UpdatePlanEquipo;
use App\Models\Equipo;


class PlanesEquiposController extends Controller
{
    public function store(StorePlanEquipo $request)
    {
        $new = Equipo::find($request->equipo_id);
        $new->planes()->attach($request->plan_id);
        return response()->json($new->planes);
    }

    public function update(UpdatePlanEquipo $request)
    {
        $update = Equipo::find($request->equipo_id);
        $update->planes()->updateExistingPivot($request->plan_id, ['plan_pe'=>$request->new_plan_id]);
        return response()->json($update->planes);
    }

    public function destroy(DeletePlanEquipo $request)
    {
        $del = Equipo::find($request->equipo_id);
        $del->planes()->detach($request->plan_id);
        return response()->json($del->planes);
    }
}
