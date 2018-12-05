@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Provas geradas:
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
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>Código</th>
	          <th>Data / Hora</th>
	          <th>Opção</th>
	        </tr>
	      </thead>
          <tfoot>
            <tr>
              <th id="teste">Código</th>
	          <th id="teste">Data / Hora</th>
	          <th></th>
            </tr>
          </tfoot>
          <tbody>
          	
            @foreach($provas as $key => $prova)
		      <tr>
		        <td>{{$prova['id']}}</td>
		        <td>{{$prova->created_at->format('d/m/Y H:i:s')}}</td>
		        <td>
		        	<div class="btn-group">
			          <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deletModal{{$key}}">Deletar</a>

			          <div>
			          	@isset($prova)

							@include('deletes.deletar_prova')

						@endisset
			          </div>

			          <div>
			          	<a class="btn btn-warning btn-sm" href="./provas/{{$prova['id']}}.pdf" download="prova{{$prova['id']}}.pdf" role="button">Download Prova</a>
			          </div>

			          @foreach($gabs as $gabarito)

			          	@if ($gabarito->id == $prova['id'])
				          <form action="{{url('gabarito')}}" method="get" target="_blank">
				            @csrf
				            <input name="_method" type="hidden" value="IMPRIMIR">
				            <input name="id" type="hidden" value="{{$prova['id']}}">
				            <button class="btn btn-success btn-sm" type="submit">Gabarito</button>
				          </form>
					     @endif

				      @endforeach
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

<script src="{{ asset('js/tabelas.js') }}"></script>

@endsection

@endsection