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
        $materias=\App\Materia::all();
        return view('questao_objetiva',compact('materias') );
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
    public function store(StoreQuestaoObjetiva $request)
    {
        //
        $questao_objetiva = new \App\Questao_Objetiva();
        $questao_objetiva->materia_id = $request->get('materia_id');
        $questao_objetiva->assunto_id = $request->get('assunto_id');
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
        $questao = \App\Questao_Objetiva::find($id);
        $materias = \App\Materia::all();
        $assunto=\App\Assunto::find($questao->assunto_id);

        $assuntos_original = \App\Materia::find($questao->materia_id)->assuntos()->get();
        $alternativas = $questao->alternativa()->get();

        //dd($alternativas);

        return view('editar_questao_objetiva',compact('questao' , 'id', 'materias', 'assunto', 'assuntos_original', 'alternativas'));
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
        $questao_objetiva = \App\Questao_Objetiva::find($id);
        $questao_objetiva->materia_id = $request->get('materia_id');
        $questao_objetiva->assunto_id = $request->get('assunto_id');
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
        $questao = \App\Questao_Objetiva::find($id);
        $questao->delete();
        return redirect('list_questoes_objetivas')->with('success','Questão deletada!');
    }

    public function getAssuntos($materia_id)
    {
        //
            $assuntos = \App\Materia::find($materia_id)->assuntos;
            //$assuntos->get(['id', 'descricao']);
            //return Response::json($assuntos);
            return response()->json($assuntos);

            
    }

    public function listar_questoes()
    {
        //
        $questoes = \App\Questao_Objetiva::all();

        foreach ($questoes as $key => $questao) {
            $disciplinas[$key] = \App\Materia::find($questao->materia_id);
            $assuntos[$key] = \App\Assunto::find($questao->assunto_id);
        }

        //dump($questoes);
        //dump($disciplinas);
        //dd($assuntos);
        //$disciplinas = \App\Materia::all();

        return view('listar_questoes_objetivas',compact('questoes','disciplinas','assuntos'));
    }
}
