<?php $categories = \App\Models\Category::all() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Майстер Покриття</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('Images/LogoMP.png') }}" type="image/png" sizes="32x32">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>

<div class="site-wrap">


    <div class="site-navbar py-2">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="{{ route('index') }}" class="js-logo-clone">Майстер Покриття</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active"><a href="{{ route('index') }}">Головна</a></li>
                            <li class="has-children">
                                <a href="#">Каталог</a>
                                <ul class="dropdown">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('shop', $category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('aboutus') }}">Про компанію</a></li>
                            <li><a href="{{ route('contacts') }}">Контакти</a></li>
                            @auth()
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                    <a href="{{ route('cart') }}" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        @if(session()->get('cart', []))
                        <span class="number">{{ count(session()->get('cart', [])) }}</span>
                        @endif
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                            class="icon-menu"></span></a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                    <div class="block-7">
                        <h3 class="footer-heading mb-4">Про компанію</h3>
                        <p>Ми - провідний постачальник якісних покриттів для підлоги з багаторічним досвідом. Наша команда створює незабутні та естетично привабливі підлоги, забезпечуючи найкращі послуги на ринку.</p>
                    </div>

                </div>
                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Категорії</h3>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                            <li><a href="{{ route('shop', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Контактна інформація</h3>
                        <ul class="list-unstyled">
                            <li class="address">Україна, м. Дніпро вул. Київська 5 офіс 200</li>
                            <li class="phone"><a href="tel://0687904095">+380 (68) 790 40 95</a></li>
                            <li class="email">Spectrtorg@gmail.com</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | by <a href="" target="_blank"
                                                                                                               class="text-dark">FoxCreator</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


</body>

</html>
