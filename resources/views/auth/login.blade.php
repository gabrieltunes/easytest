@extends('layouts.logar')

@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">{{ __('Login') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <div class="form-label-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        <label for="email">{{ __('E-Mail') }}</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        
                        <label for="password">{{ __('Senha') }}</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="remember-me">
                          Lembrar Senha
                        </label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>

                </form>

                <div class="text-center">
                    <a class="d-block small mt-3" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                    <a class="d-block small" href="{{ route('password.request') }}">{{ __('Esqueceu a Senha?') }}
                    </a>
                </div>
        </div>
    </div>
</div>

@endsection
