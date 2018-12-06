@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Cabeçalhos Cadastrados
  	</div>
  	<br>
  	
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
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>Descrição</th>
	          <th>Logo</th>
	          <th>Opções</th>
	        </tr>
	      </thead>
          <tfoot>
            <tr>
              <th id="teste">Descrição</th>
	          <th></th>
	          <th></th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($cabecalhos as $key => $cabecalho)
		      <tr>
		        <td>{{$cabecalho['nome']}}</td>
		        <td><img src="./logo/{{$cabecalho['logo']}}"
					     alt="logo"
					     width="200"
					     height="141"
					     title="Logo do cabeçalho"></td>
		        <td>
		        	<div class="btn-group">
			          <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletModal{{$key}}">Deletar</a>

			          <div>
			          	@isset($cabecalho)

							@include('deletes.deletar_cabecalho')

						@endisset
			          </div>

			          <div>
	                    <a href="{{action('Cabecalho_ProvaController@edit', $cabecalho['id'])}}" class="btn btn-warning btn-sm">Editar</a>
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