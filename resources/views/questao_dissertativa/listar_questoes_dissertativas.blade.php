@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Questões Dissertativas Cadastradas:
  </div>

  <div class="card-body">
  	@if($errors->any())
		<div class="alert alert-danger" role="alert">
		  	@foreach($errors->all() as $error)
			 	{{ $error }}
			@endforeach
		</div>

		@elseif(session()->has('success'))
  		<div class="alert alert-success" role="alert">
  		  {{ session('success') }}
  		</div>
	  @endif
    
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Código</th>
          <th>Disciplina</th>
          <th>Assunto</th>
          <th>Dificuldade</th>
          <th>Opções</th>
          
        </tr>
      </thead>
        <tfoot>

          <th id="teste">Código</th>
          <th id="teste">Disciplina</th>
          <th id="teste">Assunto</th>
          <th id="teste">Dificuldade</th>
          <th ></th>

        </tfoot>
        <tbody>
        	
          @foreach($questoes as $key => $questao)
    	      <tr>
    	        <td>{{$questao->id}}</td>
              <td>{{$disciplinas[$key]->descricao}}</td>
              <td>{{$assuntos[$key]->descricao}}</td>
              <td>{{$questao->dificuldade}}</td>
    	        <td>
    	        	<div class="btn-group">
                  <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletModal">Deletar</a>

                  <div>
                    <a href="{{action('Questao_DissertativaController@edit', $questao['id'])}}" class="btn btn-warning btn-sm">Editar</a>
                  </div>

                </div>
    	        </td>
    	      </tr>
          @endforeach
	
        </tbody>
      </table>
    </div>
  </div>
</div>

@isset($questao)

@include('deletes.deletar_dissertativa')

@endisset

@section('post-script')


<script src="{{ asset('js/tabelas.js') }}"></script>


@endsection

@endsection