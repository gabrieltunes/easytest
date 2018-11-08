@extends('layouts.pric')

@section('content')


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header"><b>1º</b> escolha o cabeçalho da prova</div>
			<div class="card-body">
				<form method="post" action="{{url('prova_materia')}}" enctype="multipart/form-data">
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
			    		<label for="cabecalho" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Cabeçalho:') }}</label>
					    <div class="col-sm-9">
					      <select name="cabecalho" id="cabecalho" class="form-control" required="ON">
	                            <option value="">Selecione o cabecalho</option>
	                            @foreach ($cabecalhos as $cabecalho)
	                                <option value="{{$cabecalho->id}}" > {{$cabecalho->nome}}</option>
	                            @endforeach     
                          </select>
					    </div>
			  		</div>

			  		<br><br>  
				  	<div class="form-group row">
				  		<div class="col-sm-4"></div>
				  		<div class="col-sm-3">
			      			<button type="submit" class="btn btn-primary btn-block">{{ __('Seguinte') }}</button>
				    	</div>
				 	 </div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection