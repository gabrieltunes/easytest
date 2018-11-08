<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materia_id = $request->get('nome');;
        return view('prova_questoes',compact('materia_id') );
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('prova');
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


    public function provaMateria(Request $request)
    {
        //
        $cabecalho = $request->get('cabecalho');
        $materias=\App\Materia::all();

        $info["cabecalho"] =  $cabecalho;
        $info["materias"] =  $materias;

        return view('prova_materia',compact('info') );
    }


    public function provaQuestoes(Request $request)
    {
        //
        //
        $cabecalho = $request->get('cabecalho');
        $materia_id = $request->get('materia_id');
        $assuntos = \App\Materia::find($materia_id)->assuntos;

        $info["cabecalho"] =  $cabecalho;
        $info["assuntos"] =  $assuntos;

        return view('prova_questoes',compact('info') );
        
        
    }


    public function provaCabecalho()
    {
        //
        $professor_id = auth()->user()->id;
        $cabecalhos = \App\Professor::find($professor_id)->cabecalho_provas;
        return view('prova_cabecalho',compact('cabecalhos'));
    }
}
