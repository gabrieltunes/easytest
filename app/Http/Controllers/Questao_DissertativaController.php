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
        $questao = \App\Questao_Dissertativa::find($id);
        //$materia=\App\Materia::find($questao->materia_id);
        $materias = \App\Materia::all();
        $assunto=\App\Assunto::find($questao->assunto_id);

        $assuntos_original = \App\Materia::find($questao->materia_id)->assuntos()->get();
        //dump($assunto);
        //dd($materia);
        return view('editar_questao_dissertativa',compact('questao' , 'id', 'materias', 'assunto', 'assuntos_original'));
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
        $questao= \App\Questao_Dissertativa::find($id);
        $questao->materia_id=$request->get('materia_id');
        $questao->assunto_id=$request->get('assunto_id');
        $questao->enunciado=$request->get('enunciado');
        $questao->dificuldade=$request->get('dificuldade');
        $questao->save();
        return redirect('list_questoes_dissertativas')->with('success','Questão atualizado com sucesso!');
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
        $questao = \App\Questao_Dissertativa::find($id);
        $questao->delete();
        return redirect('list_questoes_dissertativas')->with('success','Questão deletada!');
    }

    public function getAssuntos($materia_id)
    {
        //
            $assuntos = \App\Materia::find($materia_id)->assuntos;

            //dd($assuntos);
            //$assuntos->get(['id', 'descricao']);
            //return Response::json($assuntos);
            return response()->json($assuntos);

            
    }

    public function listar_questoes()
    {
        //
        $questoes = \App\Questao_Dissertativa::all();

        foreach ($questoes as $key => $questao) {
            $disciplinas[$key] = \App\Materia::find($questao->materia_id);
            $assuntos[$key] = \App\Assunto::find($questao->assunto_id);
        }

        //dump($questoes);
        //dump($disciplinas);
        //dd($assuntos);
        //$disciplinas = \App\Materia::all();

        return view('listar_questoes_dissertativas',compact('questoes','disciplinas','assuntos'));
    }
}
