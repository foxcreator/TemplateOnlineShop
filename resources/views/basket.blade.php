@extends('master')

@section('title', 'basket')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="row">
            <div class="col-lg-5 product">
                <h2>Кошик</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 product" >
                <div class="container">
                    <div class="starter-template">
                        @if(session()->has('success'))
                            <p class="alert alert-success">{{ session()->get('success') }}</p>
                        @endif
                        <div class="panel">
                            @if($order->products == null)
                                <p>Кошик порожній</p>
                                <div class="btn-group pull-right" role="group">
                                    <a type="button" class="btn btn-success" href="{{ route('show', $category ?? '') }}">Додати товар</a>
                                </div>
                            @else
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Назва</th>
                                    <th>Кількість</th>
                                    <th>Ціна</th>
                                    <th>Вартість</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order->products as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                            <img height="56px" src="{{ asset('Images/' . $product->image) }}">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td><span class="badge text-bg-secondary" style="color: #1a202c">{{ $product->pivot->count }}</span>
                                        <div class="btn-group form-inline">
                                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                                <button type="submit" class="btn btn-outline-danger" href="{{ route('basket-remove', $product) }}"><span
                                                        class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                                                @csrf
                                            </form>
                                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                                <button type="submit" class="btn btn-outline-success"
                                                        href="{{ route('basket-add', $product) }}"><span
                                                        class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                                @csrf

                                        </div>
                                    </td>
                                    <td>{{ $product->price }} ₴</td>
                                    <td>{{ $product->getPriceForCount() }} ₴</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Загальна вартість:</td>
                                    <td>{{ $order->GetFullPrice() }} ₴</td>
                                </tr>
                                </tbody>
                            </table>

                            <br>
                            <div class="btn-group pull-right" role="group">
                                    <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">Оформити замовлення</a>
                            </div>
                            @endif
                            <br>
                            <br>
                            <br>
            </div>
        </div>

    </div>
</div>

@endsection

