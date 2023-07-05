@extends('layouts.app')

@section('title', 'basket')

@section('content')
    <div class="site-section">
        <div class="container">
            @if(!$cart)
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
                                <th class="product-price">Ціна</th>
                                <th class="product-quantity">Кількість</th>
                                <th class="product-total">Сума</th>
                                <th class="product-remove">Видалити</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $product)
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{ $product['image'] }}" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ $product['name'] }}</h2>
                                </td>
                                <td>
                                    <h2 class="h5 text-black">{{ $product['price'] }} грн</h2></td>
                                <td>
                                    <h2 class="h5 text-black">{{ $product['quantity'] }}</h2>

                                </td>
                                <td>{{ $product['price'] * $product['quantity'] }} грн</td>
                                <td>
                                    <form action="{{ route('cart.remove', $product['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger height-auto btn-sm">X</button>
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
                        <form action="{{ route('cart.clear') }}" method="POST" class="col-md-6 mb-3 mb-md-0">
                            @csrf
                            <button class="btn btn-danger btn-md btn-block">Очистити корзину</button>
                        </form>
                        <div class="col-md-6">
                            <a href="{{ route('index') }}" class="btn btn-outline-warning btn-md btn-block">Продовжити покупки</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Загальна вартість</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Разом без ПДВ</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $total - $total * 0.2 }} грн.</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">ПДВ</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $total * 0.2 }} грн.</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Разом</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"> {{ $total }} грн.</strong>
                                </div>
                            </div>

                            <div class="row">
                                <form action="{{ route('check') }}" method="GET" class="col-md-12">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="false">
                                        Підтвердити заказ
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
@endsection

