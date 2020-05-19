@extends('layout.app')

@section('title', 'Замовлення')

@section('content')
    <div class="order">
        <div>
            <h1>Оформлення замовлення</h1>
            <p id="sum">Вартість замовлення: {{ $order->getFullPrice() }} ₴</p>
            <div class="forma">
                <h6>Контактна інформація</h6>
                {{--}}@if($errors->any())
                    <div class="order_message">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif{{--}}
                <form action="{{ route('basket-confirm') }}" method="post">
                    @csrf
                    @guest
                        <label>Введіть прізвище:</label>
                        <input type="text" name="surname" id="width" required>
                        <label>Введіть ім'я:</label>
                        <input type="text" name="name" id="width" required>
                        <label>Email:</label>
                        <input type="email" name="email" id="width" required>
                    @else
                        <p><strong>{{ Auth::user()->name }}</strong>, ваші дані які ви ввели під час реєстрації
                        будуть використанні для оформлення замовлення. Введіть ще телефон та вашу адресу:</p>
                        <input type=hidden name="surname" value="{{ Auth::user()->surname }}">
                        <input type=hidden name="name" value="{{ Auth::user()->name }}">
                        <input type=hidden name="email" value="{{ Auth::user()->email }}">
                    @endguest
                    <label>Телефон:</label>
                    <input type="text" name="phone" id="width" required>
                    <label>Адреса:</label>
                    <textarea name="address" required></textarea>
                    <input type="submit" class="button" value="Надіслати">
                </form>
            </div>
        </div>
    </div>
@endsection
