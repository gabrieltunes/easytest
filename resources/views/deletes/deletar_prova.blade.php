<div class="modal fade" id="deletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-danger" action="{{action('ProvaController@destroy', $prova['id'])}}" onclick="event.preventDefault();document.getElementById('exclusao-form').submit();">{{ __('Excluir') }}</a>

            <form id="exclusao-form" action="{{action('ProvaController@destroy', $prova['id'])}}" method="POST">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            </form>
        </div>
    </div>
</div>