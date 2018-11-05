<?php

namespace App\Http\Controllers;


use App\User;
use App\Personaje;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
             'NickPublico'=>'required'
            ,'Nombre'=>'required'
            ,'Genero'=>'required'
            ,'SkinMaterial'=>'required'
            ,'BagMaterial'=>'required'
            ,'HairCloth'=>'required'
            ,'HairMaterial'=>'required'
            ,'UpCloth'=>'required'
            ,'UpMaterial'=>'required'
            ,'LowCloth'=>'required'
            ,'LowMaterial'=>'required'
            ,'ShoeCloth'=>'required'
            ,'ShoeMaterial'=>'required'
            ,'UserId'=>'required'
            ,
        ]);
        $personaje = new Personaje(
            [
                'NickPublico'=>$request->NickPublico
                ,'Nombre'=>$request->Nombre
                ,'Genero'=>$request->Genero
                ,'SkinMaterial'=>$request->SkinMaterial
                ,'BagMaterial'=>$request->BagMaterial
                ,'HairCloth'=>$request->HairCloth
                ,'HairMaterial'=>$request->HairMaterial
                ,'UpCloth'=>$request->UpCloth
                ,'UpMaterial'=>$request->UpMaterial
                ,'LowCloth'=>$request->LowCloth
                ,'LowMaterial'=>$request->LowMaterial
                ,'ShoeCloth'=>$request->ShoeCloth
                ,'ShoeMaterial'=>$request->ShoeMaterial
                ,'UserId'=>$request->UserId
            ]
        );
        $personaje = $request->personaje();
        $persojae->save();
        return response()->json(['message' =>
            'Successfully inserted']);
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
