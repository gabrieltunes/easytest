
$('select[id=disciplina_id]').change(function () { 
    var disciplina_id = $(this).val();
    $.get('http://localhost:8000/get-assuntos/' + disciplina_id, function (assuntos) { 
        $('select[name=assunto_id]').empty();
        $.each(assuntos, function (key, value) {
            $('select[name=assunto_id]').append('<option value=' + value.id + '>' + value.descricao + '</option>');
        });
    });
});
