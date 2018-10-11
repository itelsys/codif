@extends('layouts.master')

@section('content')
<div class="container mt-5">
	<form method="POST" action="" class="mb-2">
		{{ csrf_field() }}
		<label>Filter :</label>
		<input type="text" class="form-controller" id="search" name="nameuser" placeholder="Nom utilisateur..."></input>
			
		<!-- <input type="text" class="form-controller" id="look" name="action" placeholder="Action..."></input> -->
		<input type="text" class="form-controller" id="look" name="code" placeholder="Code..."></input>
		<select class="form-controller" name="action">
			<option selected disabled>Action</option>
			<option value="Codification document">Codification document</option>
			<option value="Codification plan">Codification plan</option>
		</select>
		
		<input type="submit" name="cherche" value="chercher" class="form-controller">
		
	</form>
	<table class="table">
		<thead>
			<tr>
				<th>nom utilisateur</th>
				<th>action</th>
				<th>code</th>
				<th>Date de l'action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($acts as $act)
			<tr>			
				<td>{{$act->user_name}}</td>
				<td>{{$act->action}}</td>
				<td>{{$act->codech}}</td>
				<td>{{$act->created_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $acts->links() }}
</div>


@endsection