@extends('layout.app')

@section('content')
    <div class="home">
        <div class="block_1">
            <div class="container">
                <div>
                    <h1>GYMPENNYSHOP</h1>
                    <p>Спортивне спорядження & Мотивація</p>
                </div>
                <a href="/all_products"><button><p>Придбати</p></button></a>
                <p><img src={{URL::to('images/arrow-down.png')}}></p>
            </div>
        </div>

        <div class="block_2">
            <div class="container">
                <h1>ПРО КОМПАНІЮ</h1>
                <div class="row">
                    <div class="col-12 order-last col-lg-6 order-lg-first">
                        <p>Компанія GymPennyShop є світовим лідером з виробництва спортивних тренажерів для домашніх
                            спортзалів, фітнес-клубів, готелів, spa-салонів, реабілітаційних центрів, корпоративних
                            спортзалів, університетів, професійних спортивних центрів і т.д.
                        <p>Устаткування Technogym спроектований і виготовлений в Україні, використовується понад 15
                            мільйонами людей і його можна знайти в більш ніж 50 000 фітнес-центрах і 20 000 приватних
                            будинках в різних куточках світу. </p>
                        <p>Перевірена якість і міцність всіх моделей обладнання роблять GymPennyShop вибором «номер
                            один» для спортивних професійних центрів у всьому світі.</p>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <img src={{URL::to('images/company1.png')}}>
                    </div>
                </div>
            </div>
            <p id="popular">Найбільш популярні продукти</p>
        </div>

        <div class="block_3">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($products as $product)
                        <div class="col-6 col-md-4" id="block">
                            <img src={{URL::to('images/'.$product->image)}}>
                            <div class="under_block">
                                <p>{{ $product->name }}</p>
                                <form action="{{ route('basket-add', $product) }}" method="post">
                                    <button type="submit" class="button">Додати в корзину</button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="block_4" style="background-image: url({{asset('images/landing_foto_bottom.png')}});">
            <div class="container">
                <h1>Чому саме ми?</h1>
                <div>
                    <p>Всі тренувальні програми, що поставляються з обладнанням GymPenny, розроблені в GymPenny
                    Master Trainer Network - міжнародної мережі професійних тренерів, щоб допомогти користувачеві
                    знайти оптимальний метод тренування. Майстер-тренер GymPenny має освіту, що дозволяє передавати
                    якісні та системні знання, планувати тренування, керувати заняттями користувачів і підтримувати
                    їх. Ми несемо відповідальність перед нашими користувачами і замовниками та бажаємо тільки одного
                    - надавати їм першокласний сервіс.</p>
                </div>
                <h3>Розпочни вже зараз!</h3>
                <a href="/all_products"><button><p>Придбати</p></button></a>
            </div>
        </div>


    </div>
{{--}}<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>{{--}}
@endsection
