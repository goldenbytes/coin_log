<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDueno;
use App\Http\Requests\UpdateDueno;
use App\Models\Dueno;

class DuenosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Dueno::all());
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
    public function store(StoreDueno $request)
    {
        $nuevo = new Dueno();
        $nuevo->nombres_du = $request->nombres;
        $nuevo->apellidos_du = $request->apellidos;
        $nuevo->celular_du = $request->celular;
        $nuevo->email_du = $request->email;
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
        $aux = Dueno::with('equipos.planes')->find($id);
        return response()->json($aux);
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
    public function update(UpdateDueno $request, $id)
    {
        $edit = Dueno::find($request->id);
        $edit->nombres_du = $request->nombres ? $request->nombres : $edit->nombres_du;
        $edit->apellidos_du = $request->apellidos ? $request->apellidos : $edit->apellidos_du;
        $edit->celular_du = $request->celular ? $request->celular : $edit->celular_du;
        $edit->email_du = $request->email ? $request->email : $edit->email_du;
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
        $del = Dueno::find($id);
        if($del){
            $del->delete();
            return response()->json($del);
        }else{
            return response([],404);
        }
    }
}
