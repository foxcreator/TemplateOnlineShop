@extends('layouts.app')

@section('title', $categoryName)

@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><strong class="text-black">{{ $categoryName }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-6 col-lg-4 text-center item product-items mb-4">
                    <a href="{{ route('product', [$product->category->id, $product->id]) }}">
                        <img src="{{ $product->imageUrl }}" width="300" alt="Image">
                    </a>
                    <h3 class="text-dark">
                        <a href="{{ route('product', [$product->category->id, $product->id]) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <p class="price">{{ $product->price }} грн.</p>
                </div>
                @endforeach
            </div>
            <div class="text-center">{{ $products->links() }}</div>
        </div>
    </div>




@endsection
