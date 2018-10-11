@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			@if (session()->has('deleteuser'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session()->get('deleteuser') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('userupdate'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('userupdate') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
		</div>
	</div>
	<table class="table mt-5">
		<thead>
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Email</th>
				<th scope="col">Role</th>
				<th scope="col">Créé à</th>
				
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->type}}</td>
				<td>{{$user->created_at}}</td>
				<td>
					<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modifyuser" data-ident='{{$user->id}}' data-name='{{$user->name}}' data-email='{{$user->email}}' data-type='{{$user->type}}'>Modifier</button>
					<form method="post" action="/utilisateurs/{{ $user->id }}" style="display: inline;">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce utilisateur ?')">Supprimer</button>
				    </form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}
</div>
<div class="modal fade" id="modifyuser" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modifier utilisateur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role='form' id="form-create">
					{{ csrf_field() }}
					<input type="text" name="id" id="fetched-data" hidden>
					<div class="form-group">
						<label for="title" class="col-form-label">Nom :</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="body" class="col-form-label">Email :</label>
						<input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group row">
						<div class="col">
							<div class="form-check-inline">
								<label class="form-check-label">
                				<input type="radio" class="form-check-input" name="optradio" value="admin" id="admin">Admin</label>
                			</div>
                			<div class="form-check-inline">
                				<label class="form-check-label">
                				<input type="radio" class="form-check-input" name="optradio" value="Chef_projet" id="Chef_projet">Chef de projet</label>
                			</div>
                			<div class="form-check-inline disabled">
                				<label class="form-check-label">
                				<input type="radio" class="form-check-input" name="optradio" value="utilisateur" id="utilisateur">utilsateur</label>
                			</div>
                		</div>
                	</div>
                	<div class="form-group">
                		<label for="title" class="col-form-label">Mot.passe :</label>
                		<input type="text" class="form-control" id="pswd" name="pswd">
                	</div>
                	<div class="modal-footer">
                		<button type="submit" class="btn btn-primary" id="usermodif">Appliquer</button>
                		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                	</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection