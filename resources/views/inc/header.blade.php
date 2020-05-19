<div class="header" style="background: rgba({{$opacity}}); ">
    <div class="container">

        <div class="header_section" id="left">
            <div class="header_item" id="logo">
                <a href="/"> <img src={{URL::to('images/logo.png')}}><p>GymPennyShop</p></a>
            </div>
        </div>
        <div class="header_section" id="center">
            <div class="header_item headerButton">
                <a href="/" class="cool_link">Головна</a>
            </div>
            <div class="header_item headerButton">
                <a href="/all_products" class="cool_link">Продукція</a>
            </div>
            <div class="header_item headerButton">
                <a href="/contact" class="cool_link">Контакти</a>
            </div>
        </div>
        <div class="header_section" id="right">
                @guest
                <div class="header_item headerButton" id="left_user_login">
                <a class="right" href="/login"><img id="flaticon" src={{URL::to('images/user.png')}}></a>
                </div>
                @else
                    <div class="dropdown" id="left_user">
                        <button class="dropbtn"><a href="#"><span>{{ Auth::user()->name }}</span></a></button>
                        <div class="dropdown-content">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Вийти') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest

            <div class="header_item " id="right">
                <a class="right" href="/basket"><img id="flaticon" src={{URL::to('images/basket.png')}}></a>
            </div>
        </div>

        <div class="hamburger_menu">
            <label>
                <input type="checkbox">
                <span class="menu">
                    <span class="hamburger"></span>
                </span>

                <ul class="check_a">
                    <li><a href="/">Головна</a></li>
                    <li><a href="/all_products">Продукція</a></li>
                    <li><a href="/contact">Контакти</a></li>
                    @guest
                        <li>
                            <a href="/login">Увійти до системи</a>
                        </li>
                    @else
                        <li></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ Auth::user()->name }}/{{ __('Вийти') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    <li><a href="/basket">Корзина</a></li>
                </ul>
            </label>
        </div>
    </div>
</div>



<!--<header>
    <div class="container">
    <ul>
        <li><a href="/"> <img src="/storage/uploads/logo.png" style="width: 40px;height: 40px"><p>GymPennyShop</p></a></li>
        <div class="center">
            <li><a href="/"><p>Головна сторінка</p></a></li>
            <li><a href="/categories"><p>Продукція</p></a></li>
            <li><a href="/contact"><p>Контакти</p></a></li>
        </div>
        <li><a href="/basket"><img src="/storage/uploads/user.png" style="width: 28px;height: 28px"></a></li>
        <li><a href="/basket"><img src="/storage/uploads/basket.png" style="width: 28px;height: 28px"></a></li>
    </ul>
</div>
</header>-->
