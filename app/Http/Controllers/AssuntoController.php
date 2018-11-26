<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAssunto;

class AssuntoController extends Controller
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
        return view('assunto',compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('assunto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssunto $request)
    {
        //
        $data = [ 
            'descricao' => request('descricao'),
            'materia_id' => request('materia_id') 
        ];

        \App\Assunto::create($data);

        return redirect('/assunto')->with('success', 'Assunto adicionado com sucesso');
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
        $assunto = \App\Assunto::find($id);
        $materias=\App\Materia::all();
        //dump($assunto);
        //dd($materia);
        return view('editar_assunto',compact('assunto' , 'id', 'materias'));
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
        $assunto= \App\Assunto::find($id);
        $assunto->descricao=$request->get('descricao');
        $assunto->materia_id=$request->get('materia_id');
        $assunto->save();
        return redirect('lista_assuntos')->with('success','Assunto atualizado com sucesso!');
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
        $assunto = \App\Assunto::find($id);
        $assunto->delete();
        return redirect('lista_assuntos')->with('success','Assunto deletado!');
    }

    public function lista_assuntos()
    {
        //

        $assuntos = \App\Assunto::with('materia')->get();

        return view('listar_assuntos',compact('assuntos'));


    }


}
