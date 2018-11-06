<?php

namespace App\Http\Controllers;
use App\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'hola desde personaje controller wuu';
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
            /* ATRIBUTOS DESESTIMADOS 2018_11_6
            'NickPublico'  =>'required'
            ,'Nombre'       =>'required'
            ,*/
             'Genero'       =>'required|string'
            ,'SkinMaterial' =>'required|integer'
            ,'BagMaterial'  =>'required|integer'
            ,'HairCloth'    =>'required|integer'
            ,'HairMaterial' =>'required|integer'
            ,'UpCloth'      =>'required|integer'
            ,'UpMaterial'   =>'required|integer'
            ,'LowCloth'     =>'required|integer'
            ,'LowMaterial'  =>'required|integer'
            ,'ShoeCloth'    =>'required|integer'
            ,'ShoeMaterial' =>'required|integer'
            ,'UserId'       =>'required|integer'
            ,
        ]);
        $personaje = new Personaje(
            [
                /*'NickPublico'=>$request->NickPublico
                ,'Nombre'=>$request->Nombre
                ,*/
                'Genero'        =>$request->Genero
                ,'SkinMaterial' =>$request->SkinMaterial
                ,'BagMaterial'  =>$request->BagMaterial
                ,'HairCloth'    =>$request->HairCloth
                ,'HairMaterial' =>$request->HairMaterial
                ,'UpCloth'      =>$request->UpCloth
                ,'UpMaterial'   =>$request->UpMaterial
                ,'LowCloth'     =>$request->LowCloth
                ,'LowMaterial'  =>$request->LowMaterial
                ,'ShoeCloth'    =>$request->ShoeCloth
                ,'ShoeMaterial' =>$request->ShoeMaterial
                ,'UserId'       =>$request->UserId
            ]
        );

        if (auth()->user()->personajes()->save($personaje))
            return response()->json([
                'success' => true,
                'data' => $personaje->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Personaje could not be added'
            ], 500);
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
