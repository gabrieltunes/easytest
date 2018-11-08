@extends('layouts.pric')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">Cabeçalho</a>
	</li>
	<li class="breadcrumb-item active">Matéria</li>
</ol>


<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header"><b>2º</b> escolha a matéria da prova</div>
			<div class="card-body">
				<form method="post" action="{{url('prova_questoes')}}" enctype="multipart/form-data">
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

				<input type="hidden" name="cabecalho" value="{{$info['cabecalho']}}">

	    			<br><br>
	    			<div class="form-group row">
			    		<label for="materia_id" class="col-sm-2 col-form-label font-weight-bold control-label">{{ __('Materia:') }}</label>
					    <div class="col-sm-10">
					      <select name="materia_id" id="materia_id" class="form-control" required="ON">
	                            <option value="">Selecione a máteria</option>
	                            @foreach ($info["materias"] as $materia_id)
	                                <option value="{{$materia_id->id}}" > {{$materia_id->descricao}}</option>
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