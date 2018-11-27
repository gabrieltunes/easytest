 $(document).ready(function(){
  
      var elm_html = $('#def').html();   //faz uma cópia dos elementos a serem clonados.

      $(document).on('click', '#add', function(e){
          e.preventDefault();
          var i = $('#def').length;    //pega a quantidade de clones;
          var elementos = elm_html.replace(/\[[0\]]\]/g, '['+i+++']');  //substitui o valor dos index e incrementa++

          
          $('#definicoes').append(elementos);  //exibe o clone.
          
          
      });
  
	});