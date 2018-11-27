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
        $professor_id = auth()->user()->id;
        $disciplinas=\App\Professor::find($professor_id)->disciplinas()->get();
        return view('assunto.assunto',compact('disciplinas'));
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
            'disciplina_id' => request('disciplina_id'),
            'professor_id' => auth()->user()->id
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
        $professor_id = auth()->user()->id;

        $assunto = \App\Assunto::find($id);

        if ($assunto->professor_id == $professor_id) {
            $professor_id = auth()->user()->id;
            $disciplinas=\App\Professor::find($professor_id)->disciplinas()->get();
            return view('assunto.editar_assunto',compact('assunto' , 'id', 'disciplinas'));
        }else{
            return redirect('lista_assuntos')->with('error','Acesso negado!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAssunto $request, $id)
    {
        //
        $professor_id = auth()->user()->id;

        $assunto= \App\Assunto::find($id);

        if ($assunto->professor_id == $professor_id) {
            $assunto->descricao=$request->get('descricao');
            $assunto->disciplina_id=$request->get('disciplina_id');
            $assunto->professor_id=$professor_id;
            $assunto->save();
            return redirect('lista_assuntos')->with('success','Assunto atualizado com sucesso!');
        }else{
            return redirect('lista_assuntos')->with('error','Acesso negado!');
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
        $assunto = \App\Assunto::find($id);
        $assunto->delete();
        return redirect('lista_assuntos')->with('success','Assunto deletado!');
    }

    public function lista_assuntos()
    {
        //

        //$assuntos = \App\Assunto::with('disciplina')->get();

        $professor_id = auth()->user()->id;
        $assuntos=\App\Professor::find($professor_id)->assuntos()->get();

        return view('assunto.listar_assuntos',compact('assuntos'));


    }

    public function getAssuntos($disciplina_id)
    {
        //
            $assuntos = \App\Disciplina::find($disciplina_id)->assuntos;

            return response()->json($assuntos);

            
    }


}
