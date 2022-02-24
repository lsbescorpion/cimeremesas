@extends('layouts.app-login')

@section('content')
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

                <form class="form-horizontal form-material text-center" id="loginform" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>LOGIN</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password">
                        {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                    </div>
                    </div>
                    <div class="form-group pregunta1">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                <i class="fas fa-lock m-r-5"></i>  {{ __('Olvidó la contraseña?') }}
                            </a>
                        @endif
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{'ACCEDER'}}</button>
                        </div>
                    </div>

                    <div class="form-group pregunta">
                        @if (Route::has('register'))
                            <a class="text-info m-l-5" href="{{ route('register') }}"> ¿Aún no tienes cuenta con nosotros?</a>
                        @endif



                    </div>


                </form>




@endsection


