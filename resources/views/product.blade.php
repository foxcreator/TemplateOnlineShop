@extends('layouts.app')

@section('title')

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img src="{{ $product->imageUrl }}" alt="Image" class="img-fluid p-5">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-black pb-5">{{ $product->name }}</h2>
{{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus--}}
{{--                        soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas,--}}
{{--                        distinctio, aperiam, ratione dolore.</p>--}}


                    <p><strong class="text-primary h4">{{ $product->price }} грн.</strong></p>



                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-5">
                        @csrf
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" name="quantity" class="form-control text-center" value="1" placeholder=""
                                   aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                        <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Додати у кошик</button></p>

                    </form>


                    <div class="mt-5">
                        <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                   aria-controls="pills-profile" aria-selected="false">Опис</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                {!! nl2br($product->description) !!}
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

