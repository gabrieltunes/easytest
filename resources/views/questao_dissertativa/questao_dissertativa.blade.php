@extends('layouts.pric')

@section('content')

<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Registro de Questões Dissertativas</div>
			<div class="card-body">
				<form method="post" action="{{url('questao_dissertativa')}}" enctype="multipart/form-data">
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
			    		<label for="disciplina_id" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Disciplina:') }}</label>
					    <div class="col-sm-9">
					      <select name="disciplina_id" id="disciplina_id" class="form-control" required="ON">
                            <option value="">Clique aqui</option>
                            @foreach ($disciplinas as $disciplina_id)
                                <option value="{{$disciplina_id->id}}" > {{$disciplina_id->descricao}}</option>
                            @endforeach     
                          </select>
					    </div>
			  		</div>



			  		<div class="form-group row">
			    		<label for="assunto_id" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Assunto:') }}</label>
					    <div class="col-sm-10">
					      <select name="assunto_id" class="form-control" required="ON">
                          </select>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="dificuldade" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Dificuldade:') }}</label>
					    <div class="col-sm-8">
					      	<div class="radio">
			                    <label>
			                        <input type="radio" name="dificuldade" id="facil" value="facil" checked>Fácil
			                    </label>
		                	</div>
		                	<div class="radio">
			                    <label>
			                        <input type="radio" name="dificuldade" id="media" value="media">Média
			                    </label>
		                	</div>
			                <div class="radio">
			                    <label>
			                        <input type="radio" name="dificuldade" id="dificil" value="dificil">Difícil
			                    </label>
			                </div>
					    </div>
			  		</div>

	    			<div class="form-group row">
			    		<label for="enunciado" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Enunciado:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="enunciado" id="enunciado" rows="3" required="ON"></textarea>
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

@section('post-script')


<script src="{{ asset('js/busca-assuntos.js') }}"></script>


@endsection

@endsection