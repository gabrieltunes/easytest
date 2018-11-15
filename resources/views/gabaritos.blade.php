@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Gabaritos disponiveis (questões objetivas):
  	</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>Código</th>
	          <th>Data</th>
	          <th>Opção</th>
	        </tr>
	      </thead>
          <tfoot>
            <tr>
              <th>Código</th>
	          <th>Data</th>
	          <th>Opção</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($provas as $prova)
		      <tr>
		        <td>{{$prova['id']}}</td>
		        <td>{{$prova->created_at->format('d M Y')}}</td>
		        <td>
		          <form action="{{action('GabaritoController@destroy', $prova['id'])}}" method="post">
		            @csrf
		            <input name="_method" type="hidden" value="DELETE">
		            <button class="btn btn-danger" type="submit">Delete</button>
		          </form>
		        </td>
		      </tr>
		    @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>


@endsection