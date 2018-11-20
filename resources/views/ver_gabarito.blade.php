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

			@php

			$i = 1;

			$alt = 0;

			$sup = 0;

			@endphp


			<div align="justify">

				@foreach ($gabaritos as $gabarito)


				

					<p id="questao"> <span><b>{{$gabarito->numero_questao}} . </b></span>{{$gabarito->resposta_correta}}</p>

					<br><br>

						
			            
			    @endforeach

			</div>

		</div>

	</body>

</html>