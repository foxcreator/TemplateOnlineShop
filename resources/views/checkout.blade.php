@extends('layouts.app')

@section('title', 'basket')

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

                <form class="row" action="{{ route('cart.checkout') }}" method="POST" class="form-group">
@csrf
                <div class="col-md-5 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Детали заказа</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-10">
                                <label for="c_fname" class="text-black">Имя Фамилия <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-10">
                                <label for="c_phone" class="text-black">Телефон <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Ваш заказ</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <th>Product</th>
                                    <th>Total</th>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $item)
                                    <tr>
                                        <td>{{ $item['name'] }} <strong class="mx-2" style="font-weight: 600">x</strong> {{ $item['quantity'] }}</td>
                                        <td>{{ $item['price'] * $item['quantity'] }} грн</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Итого</strong></td>
                                        <td class="text-black font-weight-bold"><strong>{{ $total }} грн</strong></td>
                                    </tr>
                                    </tbody>
                                </table>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Сделать заказ</button>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>
                </form>
            <!-- </form> -->
        </div>
    </div>

@endsection

