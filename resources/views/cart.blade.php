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
                                <th class="product-price">Цена</th>
                                <th class="product-quantity">Количество</th>
                                <th class="product-total">Сумма</th>
                                <th class="product-remove">Удалить</th>
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
                                        <button type="submit" class="btn btn-primary height-auto btn-sm">X</button>
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
                            <button class="btn btn-primary btn-md btn-block">Очистить корзину</button>
                        </form>
                        <div class="col-md-6">
                            <a href="{{ route('index') }}" class="btn btn-outline-primary btn-md btn-block">Продолжить покупки</a>
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
                                    <strong class="text-black">{{ $total - $total * 0.2 }} грн.</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">НДС</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $total * 0.2 }} грн.</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Итого</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"> {{ $total }} грн.</strong>
                                </div>
                            </div>

                            <div class="row">
                                <form action="{{ route('check') }}" method="GET" class="col-md-12">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="false">
                                        Подтвердить заказ
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


                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Підтвердження</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    <label for="name">Им'я та призвище</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                                    <label for="phone">Номер телефона</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('check') }}" method="POST" class="col-md-12">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="false">
                                        Подтвердить заказ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

