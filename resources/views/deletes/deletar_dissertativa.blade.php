<div class="modal fade" id="deletModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
            	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Excluir" para apagar definitivamente.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>

            <form id="exclusao-form" action="{{action('Questao_DissertativaController@destroy', $questao['id'])}}" method="POST">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">{{ __('Excluir') }}</button>
            </form>
        </div>
    </div>
</div>