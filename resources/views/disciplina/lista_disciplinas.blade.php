@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Disciplinas cadastradas:
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
          <th>Descrição</th>
          <th>Opção</th>
          
        </tr>
      </thead>
        <tfoot>

          <th id="teste">Código</th>
          <th id="teste">Descrição</th>
          <th ></th>

        </tfoot>
        <tbody>
        	
          @foreach($disciplinas as $key => $disciplina)
    	      <tr>
    	        <td>{{$disciplina->id}}</td>
    	        <td>{{$disciplina->descricao}}</td>
    	        <td>
    	        	<div class="btn-group">
                  <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletModal{{$key}}">Deletar</a>

                  <div>
                    @isset($disciplina)

                      @include('deletes.deletar_disciplina')

                    @endisset
                  </div>

                  <div>
                    <a href="{{action('DisciplinaController@edit', $disciplina['id'])}}" class="btn btn-warning btn-sm">Editar</a>
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

@section('post-script')

<script src="{{ asset('js/tabelas-normal.js') }}"></script>

@endsection

@endsection