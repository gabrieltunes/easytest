<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDisciplina;
use App\Http\Requests\StoreEditDisciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('disciplina.disciplina');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('disciplina.disciplina');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisciplina $request)
    {
        //
        $professor_id = auth()->user()->id;

        $data = [ 
            'descricao' => request('descricao'),
            'professor_id' => $professor_id,
        ];

        \App\Disciplina::create($data);

        return redirect('/disciplina')->with('success', 'Disciplina adicionada com sucesso');
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
        $professor_id = auth()->user()->id;

        $disciplina = \App\Disciplina::find($id);

        if ($disciplina->professor_id == $professor_id) {
            return view('disciplina.editar_disciplina',compact('disciplina' , 'id'));
        }else{
            return redirect('lista_disciplinas')->with('error','Acesso negado!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDisciplina $request, $id)
    {
        //
        $professor_id = auth()->user()->id;

        $disciplina= \App\Disciplina::find($id);

        if ($disciplina->professor_id == $professor_id) {
            $disciplina->descricao=$request->get('descricao');
            $disciplina->professor_id=$professor_id;
            $disciplina->save();
            return redirect('lista_disciplinas')->with('success','Disciplina atualizada!');
        }else{

            return redirect('lista_disciplinas')->with('error','Acesso negado!');
        }

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

        $professor_id = auth()->user()->id;

        $disciplina = \App\Disciplina::find($id);

        if ($disciplina->professor_id == $professor_id) {
            $disciplina->delete();
            return redirect('lista_disciplinas')->with('success','Disciplina deletada!');
            
        }else{
            return redirect('lista_disciplinas')->with('error','Acesso negado!');
        }
        
    }

    public function listar()
    {
        //
        $professor_id = auth()->user()->id;

        $disciplinas= \App\Professor::find($professor_id)->disciplinas()->get();

        return view('disciplina.lista_disciplinas',compact('disciplinas'));
    }
}
