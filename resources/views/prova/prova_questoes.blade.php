@extends('layouts.pric')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">Cabeçalho</a>
	</li>
	<li class="breadcrumb-item">Disciplina</a>
	</li>
	<li class="breadcrumb-item active">Questões</li>
</ol>

<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header"><b>3º</b> selecione as questões</div>
			<div class="card-body">
				<form method="post" action="{{url('prova')}}" enctype="multipart/form-data" target="_blank">
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

	    			<input type="hidden" name="disciplina_id" value="{{$info['disciplina']}}">

	    			<input type="hidden" name="cabecalho_id" value="{{$info['cabecalho']}}"> 

	    			<div id="definicoes">


	    				<div id="def">

					  		<div class="form-group row">
					    		<label for="assunto_id" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Assunto:') }}</label>
							    <div class="col-sm-10">
							      <select name="assunto_id[]" id="assunto_id" class="form-control" required="ON">
							      	<option value="">Selecione o assunto</option>
							      	@foreach ($info['assuntos'] as $assunto_id)
	                                <option value="{{$assunto_id->id}}" > {{$assunto_id->descricao}}</option>
	                            	@endforeach
		                          </select>
							    </div>
					  		</div>



					  		<div class="form-group row">
					    		<label for="tipo" class="col-sm-3 col-form-label font-weight-bold control-label">Tipo:</label>
							    <div class="col-sm-9">
							      <select name="tipo[]" id="tipo" class="form-control" required="ON">
					                <option value="">Selecione o tipo de questão</option>
					                    <option value="objetiva" > Objetiva</option>
										<option value="dissertativa" > Dissertativa</option>  
					              </select>
							    </div>
					  		</div>


					  		<div class="form-group row">
					    		<label for="dificuldade" class="col-sm-3 col-form-label font-weight-bold control-label">Dificuldade:</label>
							    <div class="col-sm-9">
							      <select name="dificuldade[]" id="dificuldade" class="form-control" required="ON">
					                <option value="">Selecione a dificuldade</option>
					                    <option value="facil" > Fácil</option>
										<option value="media" > Média</option>
										<option value="dificil" > Difícil</option>  
					              </select>
							    </div>
					  		</div>
	  		

					  		<div class="form-group row">
					    		<label for="quantidade" class="col-sm-3 col-form-label font-weight-bold control-label">{{ __('Quantidade:') }}</label>
							    <div class="col-sm-5">
							      <input type="text" class="form-control" id="quantidade" name="quantidade[]" placeholder="Quantidade de Questões" required="ON">
							    </div>
					  		</div>

					  		<hr>

					  		<br>

				  		</div>

				  	</div>


			  		<div class="form-group row">
				  		<div class="col-sm-4"></div>
				  		<div class="col-sm-3">
			      			<button class="btn btn-success btn-block" id="add">{{ __('+ Adicionar') }}</button>
				    	</div>
			 	 	</div>

			  		<br><br>

				  	<div class="form-group row">
				  		<div class="col-sm-4"></div>
				  		<div class="col-sm-3">
			      			<button type="submit" class="btn btn-primary btn-block">{{ __('Gerar Prova') }}</button>
				    	</div>
				 	</div>

				</form>
			</div>
		</div>
	</div>
</div>

@section('post-script')

<script src="{{ asset('js/prova-questao.js') }}"></script>

@endsection

@endsection