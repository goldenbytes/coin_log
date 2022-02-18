<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlan;
use App\Http\Requests\UpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Plan::all());
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
    public function store(StorePlan $request)
    {
        $nuevo = new Plan();
        $nuevo->nombre_pl = $request->nick;
        $nuevo->tiempo_pl = $request->tiempo;
        $nuevo->valor_pl = $request->valor;
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
        $aux = Plan::with('equipos')->find($id);
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
    public function update(UpdatePlan $request, $id)
    {
        $edit = Plan::find($request->id);
        $edit->nombre_pl = $request->nick ? $request->nick : $edit->nombre_pl;
        $edit->tiempo_pl = $request->tiempo ? $request->tiempo : $edit->tiempo_pl;
        $edit->valor_pl = $request->valor ? $request->valor : $edit->valor_pl;
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
        $del = Plan::find($id);
        if($del){
            $del->delete();
            return response()->json($del);
        }else{
            return response([],404);
        }
    }
}
