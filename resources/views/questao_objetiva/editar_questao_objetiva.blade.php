@extends('layouts.pric')

@section('content')

<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Registro de Questões Objetivas</div>
			<div class="card-body">
				<form method="post" action="{{action('Questao_ObjetivaController@update', $id)}}" enctype="multipart/form-data">
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

	    			<input name="_method" type="hidden" value="PATCH">

	    			<div class="form-group row">
			    		<label for="disciplina_id" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Disciplina:') }}</label>
					    <div class="col-sm-9">
					      <select name="disciplina_id" id="disciplina_id" class="form-control" required="ON">
                            @foreach ($disciplinas as $disciplina_id)
                                <option value="{{$disciplina_id->id}}" @if($questao->disciplina_id==$disciplina_id->id) selected @endif > {{$disciplina_id->descricao}}</option>
                            @endforeach     
                          </select>
					    </div>
			  		</div>



			  		<div class="form-group row">
			    		<label for="assunto_id" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Assunto:') }}</label>
					    <div class="col-sm-10">
					      <select name="assunto_id" class="form-control" required="ON">
					      	@foreach ($assuntos_original as $assunto)
                                <option value="{{$assunto->id}}" @if($questao->assunto_id==$assunto->id) selected @endif > {{$assunto->descricao}}</option>
                            @endforeach
					      	<!--<option value="{{$questao->assunto_id}}" id="original">{{$assunto->descricao}}</option>-->
                          </select>
					    </div>
			  		</div>


			  		<div class="form-group row">
			    		<label for="dificuldade" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Dificuldade:') }}</label>
					    <div class="col-sm-8">
					      	<div class="radio">
			                    <label>
			                        <input type="radio" name="dificuldade" id="facil" value="facil" @if($questao->dificuldade=="facil") checked @endif>Fácil
			                    </label>
		                	</div>
		                	<div class="radio">
			                    <label>
			                        <input type="radio" name="dificuldade" id="media" value="media" @if($questao->dificuldade=="media") checked @endif>Média
			                    </label>
		                	</div>
			                <div class="radio">
			                    <label>
			                        <input type="radio" name="dificuldade" id="dificil" value="dificil" @if($questao->dificuldade=="dificil") checked @endif>Difícil
			                    </label>
			                </div>
					    </div>
			  		</div>


	    			<div class="form-group row">
			    		<label for="enunciado" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Enunciado:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="enunciado" id="enunciado" rows="3" required="ON">{{$questao->enunciado}}</textarea>
					    </div>
			  		</div>


			  		<input name="alternativa_id" type="hidden" value="{{$alternativas[0]->id}}">

			  		<div class="form-group row">
			    		<label for="altA" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa A:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altA" id="altA" rows="3">{{$alternativas[0]->alternativa_a}}</textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="altB" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa B:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altB" id="altB" rows="3">{{$alternativas[0]->alternativa_b}}</textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="altC" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa C:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altC" id="altC" rows="3">{{$alternativas[0]->alternativa_c}}</textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="altD" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa D:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altD" id="altD" rows="3">{{$alternativas[0]->alternativa_d}}</textarea>
					    </div>
			  		</div>


			  		<div class="form-group row">
			    		<label for="altE" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa E:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altE" id="altE" rows="3">{{$alternativas[0]->alternativa_e}}</textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="correta" class="col-sm-5 col-form-label font-weight-bold control-label">{{ __('Alternativa Correta:') }}</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="correta" name="correta" value="{{$questao->alternativa_correta}}" required="ON">
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