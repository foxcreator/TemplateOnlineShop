@extends('master')

@section('title', 'basket')

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>Підтвердити Замовлення:</h1>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($products as $product)
                    <div>{{ $product->name }} - {{ $product->pivot->count }} шт.</div>
                @endforeach
                <p>Загальна вартість: <b>{{ $product->price }} ₴</b></p>
                <form action="{{ route('basket-confirm')}}" method="POST">
                    <div>
                        <p>Вкажіть свої ім'я та номер телефону, підтвердити ваш заказ:</p>

                        <div class="container">
                            <div class="row">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-lg-5">
                                    <div class="input-group flex-nowrap ">
                                        <span class="input-group-text" id="addon-wrapping">Ім'я Прізвище</span>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Введіть ваше Прізвище та Ім'я" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div><br>

                                    <div class="input-group flex-nowrap ">
                                        <span class="input-group-text" id="addon-wrapping">Номер телефону</span>
                                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="0__-___-__-__" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                        <br>
                                    <div class="input-group flex-nowrap ">
                                        <span class="input-group-text" id="addon-wrapping">Область</span>
                                        <input type="text" name="region" id="region" class="form-control" placeholder="Дніпропетровська область" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <br>
                                    <div class="input-group flex-nowrap ">
                                        <span class="input-group-text" id="addon-wrapping">Місто</span>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Місто" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <br>
                                    <div class="input-group flex-nowrap ">
                                        <span class="input-group-text" id="addon-wrapping">Відділення Нової пошти</span>
                                        <input type="text" name="novaposhta" id="novaposhta" class="form-control" placeholder="№" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <input type="hidden" name="productNames" value="
                                        @foreach($products as $product)
                                        {{ $product->name }}
                                        @endforeach">
{{--                                    <div class="input-group flex-nowrap ">--}}
{{--                                        <span class="input-group-text" id="addon-wrapping">Продукт</span>--}}
{{--                                        <input type="text" class="form-control" value="{{ $productName }}" readonly>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">

                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            @csrf
                            <input type="submit" class="btn btn-success" value="Підтвердити Замовлення">

                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </form>
</div>

@endsection

