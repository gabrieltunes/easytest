<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProfile;
use Illuminate\Support\Facades\Hash;


class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = auth()->user()->id;
        $professor = \App\Professor::find($id);

        return view('auth.profile',compact('professor') );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    
    
    public function edit(StoreProfile $request)
    {
        //

        $data = [

            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),

        ];


        if ($data['password'] != null) {

            $data['password'] = Hash::make($data['password']);
        }else{

            unset($data['password']);
        }


        $update = auth()->user()->update($data);

        if ($update) {
            
            return redirect('profile')->with('success','Perfil atualizado com sucesso!');
        }else {
            return redirect('profile')->with('error','Erro ao atualizar o perfil...');
        }
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
