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
                    <h2 class="h3 mb-3 text-black">Деталі замовлення</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-10">
                                <label for="c_fname" class="text-black">Ім'я, прізвище<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-10">
                                <label for="c_phone" class="text-black">Телефон<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Ваше замовлення</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <th>Товар</th>
                                    <th>Всього</th>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td>{{ $item['name'] }} <strong class="mx-2"
                                                                            style="font-weight: 600">x</strong> {{ $item['quantity'] }}
                                            </td>
                                            <td>{{ $item['price'] * $item['quantity'] }} грн</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong></strong></td>
                                        <td class="text-black font-weight-bold"><strong>{{ $total }} грн</strong></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Зробити замовлення</button>
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

