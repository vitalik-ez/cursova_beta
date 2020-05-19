@extends('layout.app')

@section('content')
    <div class="order" id="register">
        <h1>Реєстрація</h1>
        <div class="forma">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                    <label for="surname">Введіть прізвище</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                    @error('surname')
                        <p class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></p>
                    @enderror
                    <label for="name">Введіть ім'я</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <p class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></p>
                    @enderror
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></p>
                    @enderror
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></p>
                    @enderror
                    <label for="password-confirm">Підтвердіть пароль</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <button type="submit" class="button">Зареєструватися</button>
            </form>
        </div>
        <div class="link-login">
            <p>Вже зареєстровані?<a href="{{ route('login') }}"> Увійти в аккаунт</a></p>
        </div>
    </div>
@endsection
