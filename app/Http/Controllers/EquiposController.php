<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipo;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use stdClass;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Equipo::with('planes')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreEquipo $request)
    {
        $nuevo = new Equipo();
        $nuevo->id_eq = Str::uuid()->toString();
        $nuevo->nombre_eq = $request->nick;
        $nuevo->serial_eq = $request->serial;
        $nuevo->ip_eq = $request->ip;
        $nuevo->propietario_eq = $request->propietario;
        $nuevo->software_eq = $request->software;
        $nuevo->hardware_eq = $request->hardware;
        $nuevo->save();
        return response()->json($nuevo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $aux = Equipo::with('planes','dueno')->find($id);
        if($aux){
            return response()->json($aux->append('config'));
        }else{
            return response()->json(new stdClass(),404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $edit = Equipo::find($request->id);
        $edit->nombre_eq = $request->nick ? $request->nick : $edit->nombre_eq;
        $edit->serial_eq = $request->serial ? $request->serial : $edit->serial_eq;
        $edit->ip_eq = $request->ip ? $request->ip : $edit->ip_eq;
        $edit->propietario_eq = $request->propietario ? $request->propietario : $edit->propietario_eq;
        $edit->software_eq = $request->software ? $request->software : $edit->software_eq;
        $edit->hardware_eq = $request->hardware ? $request->hardware : $edit->hardware_eq;
        $edit->save();
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Equipo::find($id);
        if($del){
            $del->delete();
            return response()->json($del);
        }else{
            return response([],404);
        }
    }
}
