<?php

namespace App\Http\Controllers;
use App\Partida; 
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }
        $request->validate([
             'PerId'         =>'required'
            ,'InfluyenteId'  =>'required'
            ,'CartacterId'   =>'required'
            ,'FlgIni'        =>'required'
            ,'FlgFin'        =>'required'
            ,'Level'         =>'required'
        ]);

        $partida = new Partida (
            [
                'PerId'         =>$request->PerId      
                ,'InfluyenteId'  =>$request->InfluyenteId
                ,'CartacterId'   =>$request->CartacterId
                ,'FlgIni'        =>$request->FlgIni     
                ,'FlgFin'        =>$request->FlgFin     
                ,'Level'         =>$request->Level      
            ]);

            $partida->save();
            return response()->json([
                'success' => true,
                'data' => $partida->toArray()], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
