@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			@if (session()->has('addequip'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('addequip') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('updequip'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('updequip') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('deletequip'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session()->get('deletequip') !!}
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
			<button class="btn btn-success" data-toggle="modal" data-target="#create">Ajouter</button>
		</div>
	</div>
	
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nom equipement</th>
				<th scope="col">code equipement</th>
				@If(Auth::user()->isAdmine())
				<th class="text-center">Action</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($equips as $equip)
			<tr>
				<td>{{$equip->nom_equip}}</td>
				<td>{{$equip->code_equip}}</td>
				@If(Auth::user()->isAdmine())
				<td class="text-center">
					<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modify" data-id='{{$equip->id}}' data-nom='{{$equip->nom_equip}}' data-code='{{$equip->code_equip}}'>Modifier</button>
					<form method="post" action="/equipement/{{ $equip->id }}" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce departement?')">Supprimer</button>
					</form>
				</td>
				@endif	
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $equips->links() }}
</div>
<div class="modal fade" id="modify" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modifier equipement</h5>
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
						<input type="text" class="form-control" id="code" name="codeeq">
					</div>
					
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="modifyformeq">Appliquer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="create" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ajouter equipement</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role='form' id="form-create">
					<div class="form-group">
						<label for="title" class="col-form-label">Nom :</label>
						<input type="text" class="form-control" id="noma" name="noma">
					</div>
					<div class="form-group">
						<label for="body" class="col-form-label">Code :</label>
						<input type="text" class="form-control" id="codea" name="codea">
					</div>	
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="creatformeq">Appliquer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>


@endsection