@extends('layouts.pric')

@section('content')


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Alterar Dados de Perfil</div>
			<div class="card-body">
				<form method="post" action="{{url('update_profile')}}" enctype="multipart/form-data">
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
			    		<label for="descricao" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Nome:') }}</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="name" name="name" value="{{$professor->name}}">
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="descricao" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Email:') }}</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="email" name="email" value="{{$professor->email}}" >
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="descricao" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Senha:') }}</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password">
					    </div>
			  		</div>

			  		<br><br>  
				  	<div class="form-group row">
				  		<div class="col-sm-4"></div>
				  		<div class="col-sm-3">
			      			<button type="submit" class="btn btn-primary btn-block">{{ __('Atualizar') }}</button>
				    	</div>
				 	 </div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection