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

        $gab = \DB::table('prova_questao_obj')
            ->join('prova', 'prova.id', '=', 'prova_questao_obj.prova_id')
            ->select('prova.id')
            ->get();

        $gabs = $gab->unique();

         
        

        return view('prova.lista_provas')->with('provas', $provas)->with('gabs', $gabs);  
        
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
        $disciplina = $request->get('disciplina_id');
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

        //dump($professor_id);
       // dump($disciplina);
        //dump($cabecalho);
        //dump($assuntos);
        //dump($tipos);
        //dump($dificuldades);
        //dump($quantidades);
        //dump($prova);





        for ($i=0; $i < $times; $i++) { 

            //dump($tipos[$i]);
           

            if ($tipos[$i] == "dissertativa") {


                //dump($assuntos[$i]);
                //dump($dificuldades[$i]);
                //dump($quantidades[$i]);


                $random_questions = DB::table('questao_dissertativa')->where([
                    ['disciplina_id', $disciplina],
                    ['assunto_id', $assuntos[$i]],
                    ['dificuldade', $dificuldades[$i]],
                    ['professor_id', $professor_id],
                ])->inRandomOrder()->take($quantidades[$i])->get();

                //dd($random_questions);


                foreach ($random_questions as $questao) {

                    $provaSelecionada = \App\Prova::find($prova_id);

                    $provaSelecionada->questao_dissertativas()->attach($questao->id);

                }

            }elseif ($tipos[$i] == "objetiva") {

                 $random_questions = DB::table('questao_objetiva')->where([
                    ['disciplina_id', $disciplina],
                    ['assunto_id', $assuntos[$i]],
                    ['dificuldade', $dificuldades[$i]],
                    ['professor_id', $professor_id],
                ])->inRandomOrder()->take($quantidades[$i])->get();


                foreach ($random_questions as $questao) {

                    $provaSelecionada = \App\Prova::find($prova_id);

                    $provaSelecionada->questao_objetivas()->attach($questao->id);

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

        $disciplinaRead = \App\Disciplina::find($disciplina);

        $questoes_objetivas = \App\Prova::find($prova_id)->questao_objetivas()->get();
        $questoes_dissertativas = \App\Prova::find($prova_id)->questao_dissertativas()->get();

        $questoes["objetivas"] = $questoes_objetivas;
        $questoes["dissertativas"] = $questoes_dissertativas;

        $professor = auth()->user()->name;



    
        $pdf = PDF::loadView('prova.ver_prova', ['cabecalho_prova' => $cabecalho_prova, 'professor' => $professor, 'disciplina' => $disciplinaRead, 'questoes' => $questoes, 'alternativas' => $alternativas]);

        $pdf->save('./provas/' . $prova_id . '.pdf');


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
        $prova = \App\Prova::find($id);
        $prova->delete();
        return redirect('prova')->with('success','Prova excluida!');
    }


    public function provaDisciplina(Request $request)
    {
        //
        $professor_id = auth()->user()->id;
        $cabecalho = $request->get('cabecalho');
        $disciplinas=\App\Professor::find($professor_id)->disciplinas()->get();

        $info["cabecalho"] =  $cabecalho;
        $info["disciplinas"] =  $disciplinas;

        //dd($info);

        return view('prova.prova_disciplina',compact('info') );
    }


    public function provaQuestoes(Request $request)
    {
        //
        //
        $cabecalho = $request->get('cabecalho');
        $disciplina_id = $request->get('disciplina_id');
        $assuntos = \App\Disciplina::find($disciplina_id)->assuntos;

        $info["cabecalho"] =  $cabecalho;
        $info["assuntos"] =  $assuntos;
        $info["disciplina"] =  $disciplina_id;

        return view('prova.prova_questoes',compact('info') );
        
        
    }


    public function provaCabecalho()
    {
        //
        $professor_id = auth()->user()->id;
        $cabecalhos = \App\Professor::find($professor_id)->cabecalho_provas;
        return view('prova.prova_cabecalho',compact('cabecalhos'));
    }
}
