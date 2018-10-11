@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			@if (session()->has('successite'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('successite') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('successitem'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('successitem') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('deletesite'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session()->get('deletesite') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
			<!-- <form method="POST" action="" class="filterform mt-3 mb-2">
				<input type="text" class="form-controller" id="look" name="chnom" placeholder="Nom..."></input>
				<input type="text" class="form-controller" id="look" name="chcode" placeholder="Code..."></input>
				<input type="submit" name="cherche" value="Chercher" class="form-controller">
			</form> -->
		</div>

		<div class="col-md-2 mt-3 mb-2">
			<button class="btn btn-success" data-toggle="modal" data-target="#createsite">Ajouter</button>
		</div>
	</div>
	
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nom site</th>
				<th scope="col">code site</th>
				@If(Auth::user()->isAdmine())
				<th class="text-center">Action</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($sites as $site)
			<tr>
				<td>{{$site->nom_site}}</td>
				<td>{{$site->code_site}}</td>
				@If(Auth::user()->isAdmine())
				<td class="text-center">
					<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modify" data-id='{{$site->id}}' data-nom='{{$site->nom_site}}' data-code='{{$site->code_site}}'>Modifier</button>
					<form method="post" action="/site/{{ $site->id }}" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce site?')">Supprimer</button>
					</form>
				</td>
				@endif	
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $sites->links() }}
</div>
<div class="modal fade" id="modify" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modifier Site</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role='form' id="form-modify">
					<input type="text" name="id" id="fetched-data" hidden>
					<div class="form-group">
						<label for="title" class="col-form-label">Nom :</label>
						<input type="text" class="form-control" id="nom" name="nom">
					</div>
					<div class="form-group">
						<label for="body" class="col-form-label">Code :</label>
						<input type="text" class="form-control" id="code" name="codesite">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="modifyforms">Appliquer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="createsite" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ajouter Site</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role='form' id="form-create">
					<div class="form-group">
						<label for="title" class="col-form-label">Nom :</label>
						<input type="text" class="form-control" id="noma" name="nomas" required>
					</div>
					<div class="form-group">
						<label for="body" class="col-form-label">Code :</label>
						<input type="text" class="form-control" id="codea" name="codeas" required>
					</div>	
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="creatformsite">Appliquer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>


@endsection