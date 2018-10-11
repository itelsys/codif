<header>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		@If(Auth::check() && Auth::user()->isAdmine())
		<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="text-white">&#9776;</span>
		@elseif(Auth::check() && Auth::user()->isSupAdmine())
		<span style="font-size:30px;cursor:pointer" onclick="openNav_2()" class="text-white">&#9776;</span>
		@endif
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-3 mr-auto">
				
				<li class="nav-item">
					<a class="nav-link text-white" href="/codification">Codifier un document</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="/codifPlan" >Codifier un plan</a>
				</li>
			</ul>
			<ul class="nav navbar-nav flex-row justify-content-center flex-row nav-ul-2">
				<button class="btn btn-outline-success mr-sm-2" data-toggle="modal" data-target="#cherchedoc" type="submit">Chercher doc</button>
				<button class="btn btn-outline-success mr-sm-2" data-toggle="modal" data-target="#chercheplan" type="submit">Chercher plan</button>
				
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                	<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/changePassword">
							Changer m.passe
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						    {{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						
					</div>
				</li>
				@endguest
            </ul>
		</div>
	</nav>
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<h6 style="color: white;">Espace Document</h6>
		<a href="/site">Site</a>
		<a href="/projet">Projet</a>
		<a href="/departement">Departement</a>
		<a href="/document">Type document</a>
		<h6 style="color: white;">Espace Plan</h6>
		<!-- <a href="/site">Site</a>
		<a href="/projet">Projet</a> -->
		<a href="/atelier">Atelier</a>
		<a href="/ligne">Ligne</a>
		<a href="/sous-atelier">SOUS-ATELIER</a>
		<a href="/equipement">EQUIPEMENT</a>
		<!-- <a href="/plan">Plan</a> -->
		<h6 style="color: white;">Espace utilisateur</h6>
		<a href="/registeration">Ajouter un utilisateur</a>
		<a href="/utilisateurs">Tous les utilisateurs</a>
		<h6 style="color: white;">Autre</h6>
		<a href="/action">Liste des actions</a>
	</div>
	<div id="mySecondSidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav_2()">&times;</a>
		<h6 style="color: white;">Espace Document</h6>
		<a href="/site">Site</a>
		<a href="/projet">Projet</a>
		<a href="/departement">Departement</a>
		<a href="/document">Type document</a>
		<h6 style="color: white;">Espace Plan</h6>
		<!-- <a href="/site">Site</a>
		<a href="/projet">Projet</a> -->
		<a href="/atelier">Atelier</a>
		<a href="/ligne">Ligne</a>
		<a href="/sous-atelier">SOUS-ATELIER</a>
		<a href="/equipement">EQUIPEMENT</a>
		<!-- <a href="/plan">Plan</a> -->
	</div>
</header>
<div class="modal fade" id="chercheplan" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chercher un plan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role='form' id="form-create" method="get" action="rechercheplan">
					{{ csrf_field() }}
					<div class="row">
						<div class="col">
							<select id="noma" name="site" class="form-control">
								<option selected disabled>Site</option>
								@foreach($sts as $st)
								<option>{{$st->nom_site}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<select id="codea" name="projet" class="form-control">
								<option selected disabled>Projet</option>
								@foreach($prj as $pr) 
								<option>{{$pr->nom_projet}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<select class="form-control" name="atelier">
								<option selected disabled>Atelier</option>
								@foreach($ate as $at)
								<option>{{$at->nom_atelier}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col">
							<select class="form-control" name="satelier">
								<option selected disabled>Sous atelier</option>
								@foreach($sate as $sat)
								<option>{{$sat->nom_sa}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<select class="form-control" name="equipement">
								<option selected disabled>Equipement</option>
								@foreach($eq as $q)
								<option>{{$q->nom_equip}}</option>
								@endforeach
							</select>
						</div>	
						<div class="col">
							<select class="form-control" name="annee">
								<option selected disabled>Année</option>
								@foreach($tmp as $tp)
								<option>{{$tp}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<input type="text" class="form-control" id="codea" name="code" placeholder="code">
						</div>	
					</div>
					<div class="col-sm-12 mt-3 text-center">
						<button type="submit" class="btn btn-primary" id="creatforms" name="cherchep">Chercher</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<div class="modal fade" id="cherchedoc" role='dialog' aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chercher un document</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role='form' id="form-create" method="get" action="recherche">
					{{ csrf_field() }}
					<div class="row">
						<div class="col">
							<select class="form-control" id="noma" name="site">
								<option selected disabled>Site</option>
								@foreach($sts as $st)
								<option >{{$st->nom_site}}
								@endforeach
							</select>
						</div>
						<div class="col">
							<select id="codea" name="projet" class="form-control">
								<option selected disabled>Projet</option>
								@foreach($prj as $pr) 
								<option >{{$pr->nom_projet}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<select class="form-control" id="codea" name="dep">
								<option selected disabled>Département</option>
								@foreach($dp as $d)
								<option >{{$d->nom_dep}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col">
							<select class="form-control" id="codea" name="doc">
								<option selected disabled>Type Document</option>
								@foreach($dt as $t)
								<option >{{$t->nom_doc}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<select class="form-control" id="codea" name="year">
								<option selected disabled>Année</option>
								@foreach($tmpDoc as $tpd)
								<option>{{$tpd}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<input type="text" class="form-control" id="codedoc" name="codedoc" placeholder="code">
						</div>
					</div>
					<div class="col-sm-10 mt-3 text-center">
						<button type="submit" class="btn btn-primary" id="cherchedocu" name="cherchedocu">Chercher</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal" name="cherched">Fermer</button>		
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>