@extends('layouts.master')

@section('content')
<div class="container mt-5">
	<button type="button" id="reteur" onclick="reteur()"  class="btn">Reteur</button>
	@if(count($action)>0)
	<div class="text-right mb-2">
		<button type="button" class="btn btn-success" id="exp">Exporter</button>
	</div>
	<table class="table">
		<thead>
			<tr class="trow">
				<th>nom utilisateur</th>
				<th>action</th>
				<th>code</th>
				<th>date de l'action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($action as $act)
			<tr class="trow">
				<td>{{$act->user_name}}</td>
				<td>{{$act->action}}</td>
				<td>{{$act->codech}}</td>
				<td>{{$act->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
	@else
	<div class="row">
		<div class="col-sm-12 text-center">
			<div class="alert alert-danger" role="alert">
				pas de résultat trouvé
			</div>
		</div>
	</div>
	@endif
</div>
<script type="text/javascript">
	function reteur(){
		window.location.href = '/action';
	};
</script>
@endsection