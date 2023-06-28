@extends('layouts.app')

@section('title', 'basket')

@section('content')

    <div class="site-section">
        <div class="container">
                @dd($products->isEmpty())
            @if($products->isEmpty())
            <div class="row mb-5 ">
                <div class="col-md-12 text-center">
                    <div class="site-blocks-table">
                            <p>Кошик порожній</p>
                            <div class="btn-group pull-right" role="group">
                                <a type="button" class="btn btn-outline-warning btn-md btn-block" href="{{ route('index') }}">На головну</a>
                            </div>
                        @else
                            <div class="row mb-5 ">
                                <div class="col-md-12 text-center">
                                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail"></th>
                                <th class="product-name">Товар</th>
                                <th class="product-price">Цена</th>
                                <th class="product-quantity">Количество</th>
                                <th class="product-total">Сумма</th>
                                <th class="product-remove">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{ $product->imageUrl }}" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ $product->name }}</h2>
                                </td>
                                <td>
                                    <h2 class="h5 text-black">{{ $product->price }} грн</h2></td>
                                <td>
                                    <h2 class="h5 text-black">{{ $product->pivot->count }}</h2>

                                </td>
                                <td>{{ $product->getPriceForCount() }} грн</td>
                                <td>
                                    <form action="{{ route('basket-remove', $product) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary height-auto btn-sm"
                                                href="{{ route('basket-remove', $product) }}">X</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary btn-md btn-block">Очистить корзину</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-md btn-block">Продолжить покупки</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Итого</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Итого без НДС</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $order->getFullPrice() - $order->getFullPrice() * 0.2 }} грн.</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">НДС</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $order->getFullPrice() * 0.2 }} грн.</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Итого</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $order->getFullPrice()}} грн.</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">
                                        Подтвердить покупку
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
@endsection

