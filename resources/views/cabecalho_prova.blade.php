@extends('layouts.pric')

@section('content')


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Criação de Cabeçalho</div>
			<div class="card-body">
				<form method="post" action="{{url('cabecalho')}}" enctype="multipart/form-data">
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
			    		<label for="nome" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Descricao:') }}</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="nome" name="nome" placeholder="Descrição para o cabeçalho" required="ON">
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="logo" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Logo:') }}</label>
					    <div class="col-sm-9">
					      <input type="file" name="logo" accept=".jpg, .jpeg, .png">
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