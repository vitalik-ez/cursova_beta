@extends('layout.app')
@section('title','Корзина')
@section('content')
    <div class="container">
        <div class="shop_cart">
            <div>
                <h1>Корзина</h1>
            </div>

            @if(isset($order->products[0]))

            <table>
                <tr class="header">
                    <th colspan="2" id="bg">Товар</th>
                    <th id="bg">Кількість</th>
                    <th>Ціна</th>
                </tr>
                <tr class="new_header">
                    <th colspan="2" id="bg"><span>Товар</span></th>
                    <th id="bg">Кількість та ціна</th>
                </tr>
                @foreach($order->products as $product)
                    <tr>
                        <td colspan="2" class="image">
                            <img src={{URL::to('/images/'.$product->image)}} class="left">
                            <p class="nm_prod_del">{{ $product->name }} <br> Ціна: {{ $product->price }} ₴</p>
                        </td>
                        <td>
                            <p class="nm_prod">{{ $product->name }} <br> Ціна: {{ $product->price }} ₴</p>
                            <div class="count">
                                <div><form action="{{ route('basket-add', $product) }}" method="post">
                                    @csrf
                                    <button type="submit"><img src={{URL::to('/images/plus.png')}}></button>
                                </form></div>
                                <div class="border_top_bottom" id="top"><span>{{ $product->pivot->count }}</span></div>
                                <div><form action="{{ route('basket-remove', $product) }}" method="post">
                                    @csrf
                                    <button type="submit"><img src={{URL::to('/images/minus.png')}}></button>
                                </form></div>
                            </div>
                            <form action="{{ route('basket-remove-product', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="remove">Видалити</button>
                            </form>

                        </td>
                        <td class="price_delete">
                            <span>{{ $product->getPriceForCount() }} ₴</span>
                        </td>
                    </tr>
                @endforeach
            </table>
                <div class="suma">
                    <p align="right">Загальна вартість: {{ $order->getFullPrice() }} ₴</p>
                </div>
            <div class="order">
                <a href="{{ route('basket-place') }}"><button>Оформити замовлення</button></a>
            </div>
            @else
                <h6>Корзина порожня</h6>
            @endif
        </div>
    </div>

@endsection
