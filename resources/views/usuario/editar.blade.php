@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<h1>CREAR NUEVO usuario</h1>
				@if($errors->any())
					<div class="alert alert-danger" role="alert">
						<ul>
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form method="POST" action="/user/{{$user->id}}">
					@method('PATCH')
					{{ csrf_field()}}

					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="nit" class="col-md-4 col-form-label text-md-right">{{ __('nit') }}</label>

						<div class="col-md-6">
							<input id="nit" type="text" class="form-control @error('nit') is-invalid @enderror" name="nit" value="{{$user->nit}}" required autocomplete="nit">

							@error('nit')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
				   {{--  <div class="form-group row">
						<label for="user" class="col-md-4 col-form-label text-md-right">{{ __('user') }}</label>

						<div class="col-md-6">
							<input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user">

							@error('user')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div> --}}

					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

						<div class="col-md-6">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{$user->password}}">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
						</div>
					</div>

					<div class="form-group row">
						<label for="tipo_admin" class="col-md-4 col-form-label text-md-right">{{ __('tipo_admin') }}</label>

						<div class="col-md-6">
							{{-- <input id="tipo_admin" type="text" class="form-control @error('tipo_admin') is-invalid @enderror" name="tipo_admin" value="{{ old('tipo_admin') }}" required autocomplete="tipo_admin" autofocus> --}}
							<select class="form-control form-control-sm"  id="tipo_admin" type="text" name="tipo_admin">
								<option value="Basico">Basico</option>
								<option value="Administrador">Administrador</option>
							</select>
						   {{--  @error('tipo_admin')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror --}}
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
		<div class="col-3"></div>
	</div>
	
	
</div>

@endsection




