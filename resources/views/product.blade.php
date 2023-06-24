@extends('master')

@section('title')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="row">

            <div class="col-lg-5 product">
                <h2>{{ $product->name }}</h2><br>
                <h3>₴ {{ $product->price }}</h3>
            </div>

            <div class="col-lg-4"></div>
                <form action="{{ route('basket-add', $product->id) }}" method="POST">
                    <button type="submit" class="btn btn-success cart">Додати до кошику</button>
                    @csrf
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 product" >
                <div><img src="{{ asset('Images/' . $product->image) }}" style="max-width: 60%;"></div>
                <br>
                <br>
                <br>
            </div>
            <div class="col-lg-5 product">

                <h2>Опис, Характеристики</h2>
                <p>{{ $product->description }}</p>
                <br>

            </div>

        </div>
    </div>
</div>

@endsection

