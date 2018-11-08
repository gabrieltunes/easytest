@extends('layouts.pass')

@section('content')
<div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">{{ __('Resetar senha') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                <label for="email">{{ __('E-Mail de Cadastro') }}</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">{{ __('Resetar Senha') }}</button>
          </form>
        </div>
      </div>
</div>
@endsection
