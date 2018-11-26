<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMateria;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('materia');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('materia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateria $request)
    {
        //
        $data = [ 
            'descricao' => request('descricao') 
        ];

        \App\Materia::create($data);

        return redirect('/materia')->with('success', 'Materia adicionada com sucesso');
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
        $disciplina = \App\Materia::find($id);
        return view('editar_disciplina',compact('disciplina' , 'id'));
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
        $disciplina= \App\Materia::find($id);
        $disciplina->descricao=$request->get('descricao');
        $disciplina->save();
        return redirect('lista_materias');
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
        $disciplina = \App\Materia::find($id);
        $disciplina->delete();
        return redirect('lista_materias')->with('success','Disciplina deletada!');
    }

    public function listar()
    {
        //
        $materias=\App\Materia::all();
        return view('lista_materias',compact('materias'));
    }
}
