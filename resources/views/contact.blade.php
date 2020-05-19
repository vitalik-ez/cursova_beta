@extends('layout.app')

@section('title', 'Контакти')

@section('content')
    <div class="order" id="contact">
        @guest
            <div class="container">
        @else
            <div class="container" id="height_client">
        @endguest
            <h1>Контакти</h1>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h6>Контактна інформація</h6>
                    <div class="inform">
                        <p><img src={{URL::to('images/telephone.png')}}>Телефон: + 068 999 72 33</p>
                        <p><img src={{URL::to('images/pin.png')}}>Адреса: вулиця Довнар-Запольського, 7а, Київ, Україна</p>
                        <p><img src={{URL::to('images/mail.png')}}>Email: gympennyshop@gmail.com</p>
                    </div>
                    <div class="forma">
                        <form action="{{ route('contact-confirm') }}" method="post">
                            @csrf
                            @guest
                                <h2 id="no_name">Маєте питання? Напишіть нам.</h2>
                                <label>Введіть ім'я:</label>
                                <input type="text" name="name" id="width" required>
                                <label>Email:</label>
                                <input type="email" name="email" id="width" required>
                            @else
                                <p id="name">{{ Auth::user()->name }}, маєте питання? Напишіть нам.</p>
                                <input type=hidden name="name" value="{{ Auth::user()->name }}">
                                <input type=hidden name="email" value="{{ Auth::user()->email }}">
                            @endguest
                            <label>Телефон:</label>
                            <input type="text" name="phone" id="width" required>
                            <label>Повідомлення:</label>
                            <textarea name="question" required></textarea>
                            <input type="submit" class="button" value="Надіслати">
                        </form>
                    </div>

                </div>
                <div class="col-12 col-lg-6" id="right">
                    <img src={{URL::to('images/contact.png')}}>
                </div>
            </div>
        </div>
    </div>
@endsection
