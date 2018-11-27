@extends('layouts.pric')

@section('content')


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Edição de Assuntos</div>
			<div class="card-body">
				<form method="post" action="{{action('AssuntoController@update', $id)}}" enctype="multipart/form-data">
	    		@csrf

	    		<input name="_method" type="hidden" value="PATCH">

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

	    			<br><br>

	    			<div class="form-group row">
			    		<label for="disciplina_id" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Disciplina:') }}</label>
					    <div class="col-sm-8">
					      <select name="disciplina_id" class="form-control" name="disciplina_id">
                            @foreach ($disciplinas as $disciplina_id)
                                <option value="{{$disciplina_id->id}}" @if($assunto->disciplina_id==$disciplina_id->id) selected @endif > {{$disciplina_id->descricao}}</option>
                            @endforeach     
                          </select>
					    </div>
			  		</div>

	    			<div class="form-group row">
			    		<label for="descricao" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Assunto:') }}</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="descricao" name="descricao" value="{{$assunto->descricao}}" required="ON">
					    </div>
			  		</div>

			  		<br><br>  
				  	<div class="form-group row">
				  		<div class="col-sm-4"></div>
				  		<div class="col-sm-3">
			      			<button type="submit" class="btn btn-primary btn-block">{{ __('Salvar') }}</button>
				    	</div>
				 	 </div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection