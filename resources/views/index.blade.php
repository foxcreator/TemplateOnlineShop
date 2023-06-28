@extends('layouts.app')

@section('title', 'Головна')

@section('content')
    @if(session()->has('success'))
        <p class="alert alert-success">{{ session()->get('success') }}</p>
    @endif
    <div class="site-blocks-cover" style="background-image: url('images/floor.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">
                        <h2 class="sub-title">Якісні покриття для вашого будинку та офісу.</h2>
                        <h1>Підлога, яка вас зачарує!</h1>
                        <p>
                            <a href="#" class="btn btn-primary px-5 py-3">Придбати</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch section-overlap">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-dark h-100">
                        <a href="#" class="h-100">
                            <h5>Простота та <br> надійність  </h5>

                            <p class="pt-2">
                                Легке укладання, надійний захист, довговічність покриття
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-info h-100">
                        <a href="#" class="h-100">
                            <h5>Стиль та <br> розмаїтість</h5>
                            <p class="pt-2">
                                Великий вибір кольорів і дизайнів для інтер'єру
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap h-100">
                        <a href="#" class="h-100">
                            <h5>Міцність та <br> легке обслуговування</h5>
                            <p class="pt-2">
                                Висока міцність, легкість у догляді, довговічність покриття
                            </p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Популярні товари</h2>
                </div>
            </div>

            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-6 col-lg-4 text-center item product-items mb-4">
                    <a href="{{ route('product', [$product->category->id, $product->id]) }}"> <img src="{{ $product->imageUrl }}" width="300" alt="Image"></a>
                    <h3 class="text-dark"><a href="{{ route('product', [$product->category->id, $product->id]) }}">{{ $product->name }}</a></h3>
                    <p class="price text-bg-primary">{{ $product->price }} грн</p>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="shop.html" class="btn btn-primary px-4 py-3">Все товары</a>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Новые продукты</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($products as $product)
                            <div class="text-center item mb-4">
                                <a href="{{ route('product', [$product->category->id, $product->id]) }}"> <img src="{{ $product->imageUrl }}" width="300" alt="Image"></a>
                                <h3 class="text-dark"><a href="{{ route('product', [$product->category->id, $product->id]) }}">{{ $product->name }}</a></h3>
                                <p class="price text-bg-primary">{{ $product->price }} грн</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
