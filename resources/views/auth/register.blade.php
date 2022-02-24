@extends('layouts.app-register')

@section('content')

    <form id="msform" method="POST" action="{{ route('register') }}">
    @csrf

    <!-- progressbar -->
        <ul id="eliteregister">
            <li class="active">Account Setup</li>
            <li>Social Profiles</li>
            <li>Personal Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Crear Cuenta</h2>
            <h3 class="fs-subtitle">Este es el Paso  1</h3>
            <input id="email" class="block mt-1 w-full" type="email" placeholder="E-mail" name="email" :value="old('email')" required />
            <input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password" />
            <input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password"/>
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Opciones De Firma</h2>
            <h3 class="fs-subtitle">Your presence on the social network</h3>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <input type="radio" name="option" value="1" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        Quiero  Tramitar la firma digital
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <input type="radio" name="option" value="2" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        Recibi una invitacion para firmar un documento
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <input type="radio" name="option" value="3" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        Contratar un Sistema de Firma Electrónica
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Datos Personales</h2>
            <input type="text" id="name" name="name" placeholder="Nombre" />
            <input type="text" id="lname" name="lname" placeholder="Apellidos" />
            <input type="text" name="phone" placeholder="Teléfono" />
            <div class="flex items-center">
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <input type="checkbox" name="terms" id="terms" value="true" {{ !old("terms") ?: "checked" }}>
                <div class="ml-2">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                ]) !!}

                </div>
                @endif
            </div>
            <input type="button" name="previous" class="previous action-button" value="Anterior" />
            <x-jet-button class="ml-4 action-button">
            {{ __('Register') }}
            </x-jet-button>
            </div>

        </fieldset>
    </form>
    {{--<form method="POST" action="{{ route('register') }}">--}}
    {{--@csrf--}}

    {{--<div>--}}
    {{--<x-jet-label for="name" value="{{ __('Name') }}" />--}}
    {{--<x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
    {{--</div>--}}

    {{--<div class="mt-4">--}}
    {{--<x-jet-label for="email" value="{{ __('Email') }}" />--}}
    {{--<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
    {{--</div>--}}

    {{--<div class="mt-4">--}}
    {{--<x-jet-label for="password" value="{{ __('Password') }}" />--}}
    {{--<x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
    {{--</div>--}}

    {{--<div class="mt-4">--}}
    {{--<x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
    {{--<x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
    {{--</div>--}}

    {{--@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
    {{--<div class="mt-4">--}}
    {{--<x-jet-label for="terms">--}}
    {{--<div class="flex items-center">--}}
    {{--<x-jet-checkbox name="terms" id="terms"/>--}}

    {{--<div class="ml-2">--}}
    {{--{!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
    {{--'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',--}}
    {{--'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',--}}
    {{--]) !!}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</x-jet-label>--}}
    {{--</div>--}}
    {{--@endif--}}

    {{--<div class="flex items-center justify-end mt-4">--}}
    {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
    {{--{{ __('Already registered?') }}--}}
    {{--</a>--}}

    {{--<x-jet-button class="ml-4">--}}
    {{--{{ __('Register') }}--}}
    {{--</x-jet-button>--}}
    {{--</div>--}}
    {{--</form>--}}
@endsection

