<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistro;
use App\Models\Equipo;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{

    private $rowsPerPage = 100;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $sort = @$request->sortBy ? $request->sortBy : 'created_at';
        $desc = @$request->sortDesc ? $request->sortDesc==='true' : false;
        if($request->inicio && $request->fin){
            $aux = Registro::whereBetween('created_at', [$request->inicio, $request->fin])->orderBy($sort, $desc ? 'desc' : 'asc')->paginate($request->rowsPerPage);
        }elseif ($request->fin){
            $aux = Registro::whereDate('created_at', '<=',$request->fin)->orderBy($sort, $desc ? 'desc' : 'asc')->paginate($request->rowsPerPage);
        }elseif ($request->inicio){
            $aux = Registro::whereDate('created_at', '>=',$request->inicio)->orderBy($sort, $desc ? 'desc' : 'asc')->paginate($request->rowsPerPage);
        }else{
            $aux = Registro::orderBy($sort, $desc ? 'desc' : 'asc')->paginate($request->rowsPerPage);
        }
        return response()->json($aux);
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
    public function store(StoreRegistro $request)
    {
        $nuevo = new Registro();
        $nuevo->equipo_re = $request->equipo_id;
        $nuevo->log_re = $request->log;
        if($request->tipo){
            $nuevo->tipo_re = $request->tipo;
        }
        $nuevo->fecha_re = $request->fecha;
        $nuevo->saldo_re = $request->saldo;
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
        $aux = Equipo::find($id);
        $registros = [];
        if($aux){
            $registros = $aux->logs()->paginate($this->rowsPerPage);
        }
        return response()->json($registros);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
