<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Easy Test</title>

	</head>

	<body>

		<div class="container">


			<br><br> 

			<div id="cabecalho" align="center">

				<table border="1" align="center">
				    <tr>
				        <td colspan="2">
				        	<div align="center">
					        	<img src="./logo/{{$cabecalho_prova->logo}}"
							     alt=""
							     width="200"
							     height="200"
							     title="Logo do cabeçalho">
						 	</div>
						</td>
						
				    </tr>
				    <tr>
				        <td colspan="2">Disciplina: </td>
				    </tr>
				    <tr colspan="2">
				        <td>Professor: {{$professor}} </td>
				        <td>Nota:____________________________</td>
				    </tr>
				    <tr>
				        <td>Nome:__________________________________________</td>
				        <td>Curso:___________________________</td>
				    </tr>
				    <tr>
				    	<td>Semestre:______________________________________</td>
				    	<td>Data:____________________________</td>
				    </tr>
				</table>

			</div>

			<br><br>

			@php

			$i = 1;

			$alt = 0;

			$sup = 0;

			@endphp


			<div align="justify">

				@foreach ($questoes as $chave => $questao)


				


					@if ($chave == "objetivas")

				    	@foreach ($questao as $questao_objetiva)

						<p id="enunciado"> <span><b>{{$i++}} . </b></span>{{$questao_objetiva->enunciado}}</p>

						<br>

						<p id="alternativa_a"> <span><b>a ( ) . </b></span>{{$alternativas[$alt][$sup]['alternativa_a']}}</p>

						<p id="alternativa_b"> <span><b>b ( ) . </b></span>{{$alternativas[$alt][$sup]['alternativa_b']}}</p>

						<p id="alternativa_c"> <span><b>c ( ) . </b></span>{{$alternativas[$alt][$sup]['alternativa_c']}}</p>

						<p id="alternativa_d"> <span><b>d ( ) . </b></span>{{$alternativas[$alt][$sup]['alternativa_d']}}</p>

						<p id="alternativa_e"> <span><b>e ( ) . </b></span>{{$alternativas[$alt][$sup]['alternativa_e']}}</p>


						@php

						$alt = $alt+1;

						@endphp


						<br><br>


				    	@endforeach

				    @else


				    	@foreach ($questao as $questao_dissertativa)

						<p id="enunciado"> <span><b>{{$i++}} . </b></span>{{$questao_dissertativa->enunciado}}</p>


						<br><br><br>


				    	@endforeach



			    	@endif
			            
			    @endforeach

			</div>

		</div>

	</body>

</html>