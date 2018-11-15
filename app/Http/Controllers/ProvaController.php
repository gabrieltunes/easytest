<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class ProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professor_id = auth()->user()->id;

        $provas = \App\Professor::find($professor_id)->provas()->get();


        return view('lista_provas',compact('provas'));  
        
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
        $professor_id = auth()->user()->id;
        $materia = $request->get('materia_id');
        $cabecalho = $request->get('cabecalho_id');
        $assuntos = $request->get('assunto_id');
        $tipos = $request->get('tipo');
        $dificuldades = $request->get('dificuldade');
        $quantidades = $request->get('quantidade');


        $prova = new \App\Prova();

        $prova->professor_id = $professor_id;
        $prova->cabecalho_prova_id = $cabecalho;
        $prova->save();

        $prova_id= $prova->id;


        $times = count($quantidades);


        $alt = 0;

        $numQuest = 0;


        $alternativas = array();



        for ($i=0; $i < $times; $i++) { 
           

            if ($tipos[$i] == "dissertativa") {


                $questoes_existentes = 


                $random_questions = DB::table('questao_dissertativa')->where([
                    ['materia_id', $materia],
                    ['assunto_id', $assuntos[$i]],
                    ['dificuldade', $dificuldades[$i]],
                ])->inRandomOrder()->take($quantidades[$i])->get();


                foreach ($random_questions as $questao) {

                    $provaSelecionada = \App\Prova::find($prova_id);

                    $provaSelecionada->questao_dissertativas()->attach($questao->id, ['numero_questao' => $i+1]);

                }

            }elseif ($tipos[$i] == "objetiva") {

                 $random_questions = DB::table('questao_objetiva')->where([
                    ['materia_id', $materia],
                    ['assunto_id', $assuntos[$i]],
                    ['dificuldade', $dificuldades[$i]],
                ])->inRandomOrder()->take($quantidades[$i])->get();


                foreach ($random_questions as $questao) {

                    $provaSelecionada = \App\Prova::find($prova_id);

                    $provaSelecionada->questao_objetivas()->attach($questao->id, ['numero_questao' => $i+1]);

                    $alternativa = \App\Questao_Objetiva::find($questao->id)->alternativa()->get();


                    $alternativas[$alt] = $alternativa;

                    $gabarito = new \App\Gabarito();
                    $gabarito->prova_id = $prova_id;
                    $gabarito->numero_questao = $numQuest+1;
                    $gabarito->resposta_correta = $questao->alternativa_correta;
                    $gabarito->save();

                    $numQuest++;
                    $alt++;
                }
            }
        }

        $cabecalho_prova = \App\Cabecalho_Prova::find($cabecalho);

        $questoes_objetivas = \App\Prova::find($prova_id)->questao_objetivas()->get();
        $questoes_dissertativas = \App\Prova::find($prova_id)->questao_dissertativas()->get();

        $questoes["objetivas"] = $questoes_objetivas;
        $questoes["dissertativas"] = $questoes_dissertativas;

        $professor = auth()->user()->name;


    
        $pdf = PDF::loadView('ver_prova', ['cabecalho_prova' => $cabecalho_prova, 'professor' => $professor, 'questoes' => $questoes, 'alternativas' => $alternativas]);


        return $pdf->stream('prova.pdf');


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
