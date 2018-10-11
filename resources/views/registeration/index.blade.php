@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{!! session()->get('success') !!}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif	
			
			<h5 class=" mt-5">Creer nouveau utilisateur</h5>
			<form method="POST" action="/registeration" class="mt-3">
				{{ csrf_field() }}
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">Nom :</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
						@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif	
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
					<div class="col-md-6">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
						@if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
					<div class="col-md-6">
						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
					<div class="col-md-6">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                	<div class="col-md-6 offset-md-4">
                		<div class="form-check-inline">
                			<label class="form-check-label">
                				<input type="radio" class="form-check-input" name="optradio" value="admin">Admin
                			</label>
                		</div>
                		<div class="form-check-inline">
                			<label class="form-check-label">
                				<input type="radio" class="form-check-input" name="optradio" value="Chef_projet">Chef de projet
                			</label>
                		</div>
                		<div class="form-check-inline disabled">
                			<label class="form-check-label">
                				<input type="radio" class="form-check-input" name="optradio" value="utilsateur">utilsateur
                			</label>
                		</div>
                	</div>
                </div>
                <div class="form-group row mb-0">
                	<div class="col-md-6 offset-md-4">
                		<button type="submit" class="btn btn-primary">
                			{{ __('Register') }}
                		</button>
                	</div>
                </div>
			</form>
		</div>
	</div>
</div>
@endsection