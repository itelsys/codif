@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			@if (session()->has('typdoca'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('typdoca') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('uptypedoc'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('uptypedoc') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('deletedoctype'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session()->get('deletedoctype') !!}
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
				<th scope="col">Nom type document</th>
				<th scope="col">code type document</th>
				@If(Auth::user()->isAdmine())
				<th class="text-center">Action</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($docs as $doc)
			<tr>
				<td>{{$doc->nom_doc}}</td>
				<td>{{$doc->code_doc}}</td>
				@If(Auth::user()->isAdmine())
				<td class="text-center">
					<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modify" data-id='{{$doc->id}}' data-nom='{{$doc->nom_doc}}' data-code='{{$doc->code_doc}}'>Modifier</button>
					<form method="post" action="/departement/{{ $doc->id }}" style="display: inline;">
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
	{{ $docs->links () }}
</div>
<div class="modal fade" id="modify" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modifier type document</h5>
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
						<input type="text" class="form-control" id="code" name="codetd">
					</div>
					
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="modifyformd">Appliquer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="create" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ajouter type document</h5>
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
				<button type="submit" class="btn btn-primary" id="creatformd">Appliquer</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>


@endsection