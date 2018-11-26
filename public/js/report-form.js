var questao_id;

    $(document).ready(function(){
  
      questao_id = $('#id').val();
  });

    $('select[id=materia_id]').change(function () { 
        var materia_id = $(this).val();
        $.get('http://localhost:8000/get-assuntos/' + materia_id, function (assuntos) { // pesquisa pela url com a rota /get-cidades/uf-selecionada
            $('select[name=assunto_id]').empty();
            //$('#original').remove(); //
            $.each(assuntos, function (key, value) {
                $('select[name=assunto_id]').append('<option value=' + value.id + '>' + value.descricao + '</option>'); // adicionando as opções da filtragem da UF
            });
        });
    });
