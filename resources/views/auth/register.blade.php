@extends('layouts.logar')

@section('content')

<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registro de Professor</div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="name" class="form-control{{$errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                <label for="name">Nome</label>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                <label for="email">{{ __('E-Mail') }}</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <label for="password">{{ __('Senha') }}</label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    <label for="password-confirm">{{ __('Confirme Senha') }}</label>
                  </div>
                </div>
              </div>
            </div>



            <button type="submit" class="btn btn-primary btn-block">{{ __('Registrar') }}</button>
          </form>
        </div>
    </div>
</div>

@endsection
