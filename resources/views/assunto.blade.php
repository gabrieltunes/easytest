@extends('layouts.pric')

@section('content')


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Registro de Assuntos</div>
			<div class="card-body">
				<form method="post" action="{{url('assunto')}}" enctype="multipart/form-data">
	    		@csrf

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
			    		<label for="materia_id" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Materia:') }}</label>
					    <div class="col-sm-10">
					      <select name="materia_id" class="form-control" name="materia_id" required="ON">
                            <option value="">Clique aqui</option>
                            @foreach ($materias as $materia_id)
                                <option value="{{$materia_id->id}}" > {{$materia_id->descricao}}</option>
                            @endforeach     
                          </select>
					    </div>
			  		</div>

	    			<div class="form-group row">
			    		<label for="descricao" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Assunto:') }}</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome do Assunto">
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