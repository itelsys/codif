@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 mt-5">
			@if (!empty($msg))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! $msg !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
		</div>
	</div>
	
	@if($codplan)
	<div class="text-right">
		<button type="button" class="btn btn-success btnExp" >Exporter</button>
	</div>
	<div class="row mt-3">
		<table class="table">
			<thead>
				<tr>
					<th>Site</th>
					<th>Projet</th>
					<th>Atelier</th>
					<th>Sous Atelier</th>
					<th>Equipement</th>
					<th>Lien</th>
					<th>Version</th>
					<th>Code</th>
					<th>Codifier par</th>
					@if(Auth::user()->isAdmine())
					<th>Modifier</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach($codplan as $pl => $val)
				<tr>
					<td>{{$val->nom_site}}</td>
					<td>{{$val->nom_projet}}</td>
					<td>{{$val->nom_atelier}}</td>
					<td>{{$val->nom_sa}}</td>
					<td>{{$val->nom_equip}}</td>
					<td>{{$val->lien}}</td>
					<td>{{$val->version}}</td>
					<td>{{$val->code_site}}-{{$val->code_projet}}-{{$val->code_atelier}}-{{$val->code_sousa}}-{{$val->code_equip}}-{{sprintf('%03d',$val->num_plan)}}</td>
					<td>{{$val->user_name}}</td>
					@if(Auth::user()->isAdmine())
					<td><button  class="btn btn-success" data-toggle="modal" data-target="#modifLink" data-link='{{$val->lien}}' data-id='{{$val->id}}' data-code="{{$val->code_site}}-{{$val->code_projet}}-{{$val->code_atelier}}-{{$val->code_sousa}}-{{$val->code_equip}}-{{sprintf('%03d',$val->num_plan)}}">Modifier</button></td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
		
	@endif
		
	</div>
	<div class="modal fade" id="modifLink" role='dialog' aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modifier lien</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role='form' id="form-modify" method="post" action="">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<div class="form-group">
							<label for="title" class="col-form-label">Lien :</label>
							<input type="text" class="form-control" id="lien" name="lien">
							<input type="text" class="form-control" id="id" name="id" hidden>
							<input type="text" class="form-control" id="code" name="code" hidden>
						</div>
						<button type="submit" class="btn btn-primary" id="modifylink">Appliquer</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>

</div>

@endsection