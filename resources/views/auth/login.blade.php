@extends('layouts.app2')

@section('content')
        <div class='containner'>
            <div class="background">
                <div class="head_containner">
                    <h3>inventario</h3>
                </div>
                <form class='form_containner' method="POST" action="{{ route('login') }}">

                     @csrf

                    <input class="ee @error('email') is-invalid @enderror" type="email" name="email" placeholder="Correo" alue="{{ old('email') }}" required autocomplete="email" autofocus />
                         @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    <input class="ee @error('password') is-invalid @enderror" type="password" name="password" placeholder="Clave" required autocomplete="current-password"/>
                     @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    <input class="submit" type='submit' value="Iniciar sesion" />
                </form>
                <div class="new_cuenta">

                </div>
            </div>

        </div>

@endsection
