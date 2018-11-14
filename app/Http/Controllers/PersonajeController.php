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
        $personaje = auth()->user()->personajes;
        return response()->json([
            'success' => true,
            'data' => $personaje
        ]);
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
            return ['error' => 'request debe ser un array'];
        }
        $request->validate([
            /* ATRIBUTOS DESESTIMADOS 2018_11_6
            'NickPublico'  =>'required'
            ,'Nombre'       =>'required'
            ,*/
             'Genero'       =>'required'
            ,'SkinMaterial' =>'required'
            ,'BagMaterial'  =>'required'
            ,'HairCloth'    =>'required'
            ,'HairMaterial' =>'required'
            ,'UpCloth'      =>'required'
            ,'UpMaterial'   =>'required'
            ,'LowCloth'     =>'required'
            ,'LowMaterial'  =>'required'
            ,'ShoeCloth'    =>'required'
            ,'ShoeMaterial' =>'required'
            ,'UserId'       =>'required'
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

        /*if (auth()->user()->personajes()->save($personaje))
            return response()->json([
                'success' => true,
                'data' => $personaje->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Personaje no se pudo insertar'
            ], 500);
            */
            $personaje->save();
            return response()->json([
                'success' => true,
                'data' => $personaje->toArray()], 201);

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
        $personaje = auth()->user()->products()->find($id);
        if (!$personaje) {
            return response()->json([
                'success' => false,
                'message' => 'Personaje con id ' . $id . ' no encontrado'
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $product->toArray()
        ], 400);
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
