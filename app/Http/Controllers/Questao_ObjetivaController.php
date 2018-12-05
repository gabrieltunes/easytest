<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestaoObjetiva;

class Questao_ObjetivaController extends Controller
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
        return view('questao_objetiva.questao_objetiva',compact('disciplinas') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questao_objetiva.questao_objetiva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestaoObjetiva $request)
    {
        //
        $professor_id = auth()->user()->id;

        $questao_objetiva = new \App\Questao_Objetiva();
        $questao_objetiva->disciplina_id = $request->get('disciplina_id');
        $questao_objetiva->assunto_id = $request->get('assunto_id');
        $questao_objetiva->professor_id = $professor_id;
        $questao_objetiva->dificuldade = $request->get('dificuldade');
        $questao_objetiva->enunciado = $request->get('enunciado');
        $questao_objetiva->alternativa_correta = $request->get('correta');
        $questao_objetiva->save();

        $questao_objetiva_id= $questao_objetiva->id;

        $alternativa = new \App\Alternativa();
        $alternativa->alternativa_a = $request->get('altA');
        $alternativa->alternativa_b = $request->get('altB');
        $alternativa->alternativa_c = $request->get('altC');
        $alternativa->alternativa_d = $request->get('altD');
        $alternativa->alternativa_e = $request->get('altE');
        $alternativa->questao_objetiva_id = $questao_objetiva_id;
        $alternativa->save();

        return redirect('/questao_objetiva')->with('success', 'Questão adicionada com sucesso');
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

        $questao = \App\Questao_Objetiva::find($id);

        if (($questao) && ($questao->professor_id == $professor_id)) {
            $disciplinas= \App\Professor::find($professor_id)->disciplinas()->get();
            $assunto=\App\Assunto::find($questao->assunto_id);

            $assuntos_original = \App\Disciplina::find($questao->disciplina_id)->assuntos()->get();
            $alternativas = $questao->alternativa()->get();

            //dd($alternativas);

            return view('questao_objetiva.editar_questao_objetiva',compact('questao' , 'id', 'disciplinas', 'assunto', 'assuntos_original', 'alternativas'));
        }else{

            return redirect('list_questoes_objetivas');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestaoObjetiva $request, $id)
    {
        //
        $professor_id = auth()->user()->id;

        $questao_objetiva = \App\Questao_Objetiva::find($id);

        if (($questao_objetiva) && ($questao_objetiva->professor_id == $professor_id)) {

            $questao_objetiva->disciplina_id = $request->get('disciplina_id');
            $questao_objetiva->assunto_id = $request->get('assunto_id');
            $questao_objetiva->professor_id = $professor_id;
            $questao_objetiva->dificuldade = $request->get('dificuldade');
            $questao_objetiva->enunciado = $request->get('enunciado');
            $questao_objetiva->alternativa_correta = $request->get('correta');
            $questao_objetiva->save();

            $questao_objetiva_id= $questao_objetiva->id;
            $alternativa_id = $request->get('alternativa_id');

            $alternativa = \App\Alternativa::find($alternativa_id);
            $alternativa->alternativa_a = $request->get('altA');
            $alternativa->alternativa_b = $request->get('altB');
            $alternativa->alternativa_c = $request->get('altC');
            $alternativa->alternativa_d = $request->get('altD');
            $alternativa->alternativa_e = $request->get('altE');
            $alternativa->questao_objetiva_id = $questao_objetiva_id;
            $alternativa->save();

            return redirect('list_questoes_objetivas')->with('success','Questão atualizada com sucesso!');
        }else{
            return redirect('list_questoes_objetivas');
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
        $questao = \App\Questao_Objetiva::find($id);

        if (($questao) && ($questao->professor_id == $professor_id)) {
            $questao->delete();
            return redirect('list_questoes_objetivas')->with('success','Questão deletada!');
        }else{
            return redirect('list_questoes_objetivas');
        }
    }

    public function listar_questoes()
    {
        //
        $professor_id = auth()->user()->id;

        $questoes = \App\Professor::find($professor_id)->questoes_objetivas()->get();

        foreach ($questoes as $key => $questao) {
            $disciplinas[$key] = \App\Disciplina::find($questao->disciplina_id);
            $assuntos[$key] = \App\Assunto::find($questao->assunto_id);
        }

        return view('questao_objetiva.listar_questoes_objetivas',compact('questoes','disciplinas','assuntos'));
    }
}
