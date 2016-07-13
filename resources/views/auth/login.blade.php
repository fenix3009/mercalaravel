@extends('layouts.app')

@section('content')
<div class="container">
    <uib-tabset class="indexLor bg-Green" active="activeJustified" justified="true">
        <uib-tab index="0" heading="Login">

            <form  role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="Lor control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="Lor control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </div>
            </form>
        </uib-tab>
        <uib-tab index="1" heading="Registro">
            <form role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="Lor" for="name" >Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="Lor" for="lastname">Apellido</label>
                    <input id="lastname" type="text" class="form-control" name="lastname">
                </div>
                <div class="form-group">
                    <label class="Lor" for="birthday" >Fecha de nacimiento</label>
                    <input id="birthday" type="date" class="form-control" name="birthday">
                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="Lor" for="email" >Direccion de E-Mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="Lor" for="password" >Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="Lor" for="password-confirm" >Confirmar Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Registrar
                    </button>
                </div>
            </form>
        </uib-tab>
    </uib-tabset>
</div>
@endsection
