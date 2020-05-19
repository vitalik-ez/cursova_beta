@extends('layout.app')

@section('content')
    <div class="order" id="login">
        <h1>Увійти у систему GymPennyShop</h1>
        <div class="forma">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label>Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label>Пароль</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="check_label">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Запам'ятати мене</label>
                </div>
                <button type="submit" class="button">Увійти</button>
                        {{--}}@if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif{{--}}
            </form>
        </div>
        <div class="link-register">
            <p>У вас немає аккаунта?<a href="{{ route('register') }}"> Зареєструватися</a></p>
        </div>
    </div>
@endsection
