@extends('layout.app')
@section('title','Продукція')
@section('content')
<div class="all_products">
    <div class="container">
        @if(isset($id))
            <h2>{{ $categories[$id-1]->name }}</h2>
        @else
            <h2>Всі тренажери</h2>
        @endif
        <div class="row">
            <div class="col-sm-12 col-xl-2 col-lg-12" id="menu">
                <a id="all" href="/all_products"><h6>Всі тренажери</h6></a>
                @foreach($categories as $category)
                    <p id="transfer">
                        <a href="{{ $category->id }}">
                            <img src={{URL::to('/images/'.$category->image)}}>
                            <span>{{ $category->name }}</span>
                        </a>
                    </p>
                @endforeach
            </div>

            <div class="col-sm-12 col-xl-10 col-lg-12">
                @if(!isset($id))
                    @foreach($categories as $category)
                        @foreach($category->products as $product)
                        <div class="row block">
                            <div class="col-md-5">
                                <img src={{URL::to('/images/'.$product->image)}}>
                            </div>
                            <div class="col-md-7">
                                <div class="upper">
                                    <h3>{{ $product->name }}</h3>
                                    <span>{{ $product->description }}</span>
                                </div>
                                <div class="price_button">
                                    <div id="price">Ціна: {{ $product->price }} ₴</div>
                                    <div>
                                        <form action="{{ route('basket-add', $product) }}" method="post">
                                            <button type="submit" class="button">Додати в корзину</button>
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                {{--}}<a href="{{ route('get-product', $product) }}"><button>Більше інформації</button></a>{{--}}
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                @else
                    @foreach($categories[$id-1]->products as $product)
                        <div class="row block">
                            <div class="col-md-5">
                                <img src={{URL::to('/images/'.$product->image)}}>
                            </div>
                            <div class="col-md-7">
                                <div class="upper">
                                    <h3>{{ $product->name }}</h3>
                                    <span>{{ $product->description }}</span>
                                </div>
                                <div class="price_button">
                                    <div id="price">Ціна: {{ $product->price }} ₴</div>
                                    <div>
                                        <form action="{{ route('basket-add', $product) }}" method="post">
                                            <button type="submit" class="button">Додати в корзину</button>
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                {{--}}<a href="{{ route('get-product', $product) }}"><button>Більше інформації</button></a>{{--}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection



{{--<div class="container">

    <div class="categories">
        <a id="all" href="/categories"><h1>Всі продукти</h1></a>
        @foreach($category as $category)
            <p>
                <a href="{{ $category->name }}"> <h3>{{ $category->name }}</h3></a>
                <span>{{ $category->description }}</span>
            </p>
        @endforeach
    </div>
    <div class="product">
        @if(count($products)>0)
            @foreach($products as $product)
                <div>
                <p>
                    <img src="/storage/uploads/{{ $product->image }}">
                    <a href="product/{{ $product->id }}"> <h3>{{ $product->name }}</h3></a>
                    <span>{{ $product->description }}</span>
                    <form action="{{ route('basket-add', $product) }}" method="post">
                        <button type="submit">В корзину</button>
                        @csrf
                    </form>
                    <a href="{{ route('get-product', $product) }}"><button>Більше інформації</button></a>

                </p>
                </div>
            @endforeach
        @endif
    </div>
</div>
--}}
