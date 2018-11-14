@extends('layouts.pric')

@section('content')

<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Registro de Questões Objetivas</div>
			<div class="card-body">
				<form method="post" action="{{url('questao_objetiva')}}" enctype="multipart/form-data">
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
					      <select name="materia_id" id="materia_id" class="form-control" required="ON">
                            <option value="">Clique aqui</option>
                            @foreach ($materias as $materia_id)
                                <option value="{{$materia_id->id}}" > {{$materia_id->descricao}}</option>
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

			  		<div class="form-group row">
			    		<label for="altA" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa A:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altA" id="altA" rows="3"></textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="altB" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa B:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altB" id="altB" rows="3"></textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="altC" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa C:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altC" id="altC" rows="3"></textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="altD" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa D:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altD" id="altD" rows="3"></textarea>
					    </div>
			  		</div>


			  		<div class="form-group row">
			    		<label for="altE" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Alternativa E:') }}</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" name="altE" id="altE" rows="3"></textarea>
					    </div>
			  		</div>

			  		<div class="form-group row">
			    		<label for="correta" class="col-sm-5 col-form-label font-weight-bold control-label">{{ __('Alternativa Correta:') }}</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="correta" name="correta" placeholder="Alternativa Correta" required="ON">
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
<script type="text/javascript">
    $('select[id=materia_id]').change(function () { // ativa a função quando é selecionado uma UF pelo id = uf
        var materia_id = $(this).val(); // recebe o valor da UF
        $.get('/get-assuntos-obj/' + materia_id, function (assuntos) { // pesquisa pela url com a rota /get-cidades/uf-selecionada
            $('select[name=assunto_id]').empty(); // procura o campo com o name = cidades
            $.each(assuntos, function (key, value) {
                $('select[name=assunto_id]').append('<option value=' + value.id + '>' + value.descricao + '</option>'); // adicionando as opções da filtragem da UF
            });
        });
    });
</script>
@endsection

@endsection