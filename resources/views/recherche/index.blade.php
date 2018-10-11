@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 mt-5">
			@if (!empty($msg))
            <div class="alert alert-warning">
                {!! $msg !!}
            </div>
            @endif
		</div>
	</div>
	
	@if($document)
	<div class="text-right">
		<button type="button" class="btn btn-success btnExp" >Exporter</button>
	</div>
	<div class="row mt-3">
		<table class="table" id="export" style="table-layout: fixed;">
			<thead>
				<tr id="exportTh">
					<th>Site</th>
					<th>Projet</th>
					<th>Département</th>
					<th>Type document</th>
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
				@foreach($document as $doc => $val)
				<tr>
					<td style="word-wrap: break-word">{{$val->nom_site}}</td>
					<td style="word-wrap: break-word">{{$val->nom_projet}}</td>
					<td style="word-wrap: break-word">{{$val->nom_dep}}</td>
					<td style="word-wrap: break-word">{{$val->nom_doc}}</td>
					<td style="word-wrap: break-word">{{$val->lien }}</td>
					<td style="word-wrap: break-word">{{$val->version}}</td>
					<td >{{$val->code_site}}-{{$val->code_projet}}-{{$val->code_dep}}-{{$val->code_doc}}-{{sprintf("%03d",$val->num_doc)}}-{{$val->annee}}</td>
					<td>{{$val->user_name}}</td>
					@if(Auth::user()->isAdmine())
					<td><button  class="btn btn-success" data-toggle="modal" data-target="#modifLink" data-link='{{$val->lien}}' data-id='{{$val->id}}' data-code='{{$val->code_site}}-{{$val->code_projet}}-{{$val->code_dep}}-{{$val->code_doc}}-{{sprintf("%03d",$val->num_doc)}}'>Modifier</button></td>
					@endif
				</tr>
				@endforeach	
			</tbody>
		</table>
		
		
		@endif
		</div>
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
							<input type="text" id="code" name="code" hidden>
						</div>
						<button type="submit" class="btn btn-primary" id="modifylink" name="modifylink">Appliquer</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</form>
				</div>	
			</div>
		</div>
	</div>

</div>

@endsection