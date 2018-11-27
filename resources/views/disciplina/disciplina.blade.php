@extends('layouts.pric')

@section('content')


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Registro de Disciplina</div>
			<div class="card-body">
				<form method="post" action="{{url('disciplina')}}" enctype="multipart/form-data">
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
			    		<label for="descricao" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Disciplina:') }}</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome da Disciplina" required="ON">
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