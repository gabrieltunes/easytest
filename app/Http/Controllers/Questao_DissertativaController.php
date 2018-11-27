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
        $professor_id = auth()->user()->id;

        $disciplinas= \App\Professor::find($professor_id)->disciplinas()->get();
        return view('questao_dissertativa.questao_dissertativa',compact('disciplinas') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questao_dissertativa.questao_dissertativa');
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
        $professor_id = auth()->user()->id;

        $data = [ 
            'disciplina_id' => request('disciplina_id'),
            'assunto_id' => request('assunto_id'),
            'professor_id' => $professor_id,
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
        $professor_id = auth()->user()->id;

        
        $questao = \App\Questao_Dissertativa::find($id);

        if ($questao->professor_id == $professor_id) {

            $disciplinas= \App\Professor::find($professor_id)->disciplinas()->get();
            $assunto=\App\Assunto::find($questao->assunto_id);

            $assuntos_original = \App\Disciplina::find($questao->disciplina_id)->assuntos()->get();
            
            return view('questao_dissertativa.editar_questao_dissertativa',compact('questao' , 'id', 'disciplinas', 'assunto', 'assuntos_original'));
        }else{
            return redirect('list_questoes_dissertativas')->with('error','Acesso negado!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestaoDissertativa $request, $id)
    {
        //
        $professor_id = auth()->user()->id;

        $questao= \App\Questao_Dissertativa::find($id);

        if ($questao->professor_id == $professor_id) {
            $questao->disciplina_id=$request->get('disciplina_id');
            $questao->assunto_id=$request->get('assunto_id');
            $questao->professor_id=$professor_id;
            $questao->enunciado=$request->get('enunciado');
            $questao->dificuldade=$request->get('dificuldade');
            $questao->save();
            return redirect('list_questoes_dissertativas')->with('success','Questão atualizada com sucesso!');
        }else{
            return redirect('list_questoes_dissertativas')->with('errors','Acesso negado!');
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
        $questao = \App\Questao_Dissertativa::find($id);
        if ($questao->professor_id == $professor_id) {
            $questao->delete();
            return redirect('list_questoes_dissertativas')->with('success','Questão deletada!');
        }else{
            return redirect('list_questoes_dissertativas')->with('errors','Acesso negado!');
        }
    }

    public function listar_questoes()
    {
        //
        $professor_id = auth()->user()->id;

        $questoes = \App\Professor::find($professor_id)->questoes_dissertativas()->get();

        foreach ($questoes as $key => $questao) {
            $disciplinas[$key] = \App\Disciplina::find($questao->disciplina_id);
            $assuntos[$key] = \App\Assunto::find($questao->assunto_id);
        }

        //dump($questoes);
        //dump($disciplinas);
        //dd($assuntos);

        return view('questao_dissertativa.listar_questoes_dissertativas',compact('questoes','disciplinas','assuntos'));
    }

}
