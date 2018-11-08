<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestaoDissertativa;

class Questao_DissertativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materias=\App\Materia::all();
        return view('questao_dissertativa',compact('materias') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questao_objetiva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestaoDissertativa $request)
    {
        //
        $data = [ 
            'materia_id' => request('materia_id'),
            'assunto_id' => request('assunto_id'),
            'dificuldade' => request('dificuldade'),
            'enunciado' => request('enunciado'),
        ];

        \App\Questao_Dissertativa::create($data);

        return redirect('/questao_dissertativa')->with('success', 'Questão adicionada com sucesso');
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

    public function getAssuntos($materia_id)
    {
        //
            $assuntos = \App\Materia::find($materia_id)->assuntos;
            //$assuntos->get(['id', 'descricao']);
            //return Response::json($assuntos);
            return response()->json($assuntos);

            
    }
}
