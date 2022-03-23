<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComando;
use App\Http\Requests\UpdateComando;
use App\Models\Comando;
use Illuminate\Support\Str;

class ComandosController extends Controller
{
    private $rowsPerPage = 100;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Comando::paginate($this->rowsPerPage));
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
    public function store(StoreComando $request)
    {
        $nuevo = new Comando();
        $nuevo->id_co = Str::uuid()->toString();
        $nuevo->equipo_co = $request->equipo_id;
        $nuevo->comando_co = $request->cmd;
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
        return response()->json(Comando::find($id));
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
    public function update(UpdateComando $request, $id)
    {
        $edit = Comando::find($id);
        $edit->salida_co = $request->out;
        $edit->exito_co = $request->success;
        $edit->save();
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
