@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Ingresar</h5>
          <form form method="POST" action="{{ route('login') }}">
               @csrf

            <div class="form-label-group">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  required autofocus>
              <label for="inputEmail">Usuario</label>
              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
               @enderror
            </div>
            {{-- <div class="form-label-group">
              <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user"  required autofocus>
              <label for="inputUser">Usuario</label>
              @error('user')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
               @enderror
            </div> --}}

            <div class="form-label-group">
              <input input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <label for="inputPassword">Contraseña</label>
              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
            </div>

            {{-- <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div> --}}
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"> {{ __('Ingresar') }}</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection



