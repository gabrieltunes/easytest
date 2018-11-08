<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCabecalho_Prova;

class Cabecalho_ProvaController extends Controller
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
        $cabecalhos = \App\Professor::find($professor_id)->cabecalho_provas;
        return view('ver_cabecalhos',compact('cabecalhos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cabecalho_prova');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCabecalho_Prova $request)
    {
        //

        //$professor_id = Auth::user()->id;

        $professor_id = auth()->user()->id;

        if($request->hasfile('logo'))
         {
            $file = $request->file('logo');
            $name=$professor_id.time().$file->getClientOriginalName();
            $file->move(public_path().'/logo/', $name);
         }
        $cabecalho= new \App\Cabecalho_Prova;
        $cabecalho->nome=$request->get('nome');
        $cabecalho->logo=$name;
        $cabecalho->professor_id=$professor_id;
        $cabecalho->save();

        return redirect('/cabecalho')->with('success', 'Cabeçalho adicionado com sucesso');
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
}
