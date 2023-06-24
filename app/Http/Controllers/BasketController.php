<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\TelegramNotificationsChannelForAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            $products = $order->products;
        }else{
            $order = null;
            $products = null;
        }
        return view('basket', compact('order', 'products'));
    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::findOrFail($orderId);
        $products = $order->products;
        $totalPrice = $order->getFullPrice();
        return view('place', compact('order', 'products', 'totalPrice'));
    }

    public function basketConfirm(CreateOrderRequest $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }

        $data = $request->validated();

        $order = Order::create($data);

        if($order) {
            return redirect()->route('index')->with('success', 'заказ успешно создан');
//            $notification = new TelegramNotificationsChannelForAdmin($request->name, $request->phone, $request->region, $request->city, $request->novaposhta, $request->productNames);
//            Notification::route('telegram', -969966374)->notify($notification);
        } else  {
            return redirect()->back()->with('error', 'что то пошло не так');
        }


    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if (is_null($order)) {
            $order = Order::create();
            $orderId = $order->id;
            session(['orderId' => $orderId]);
        }

        if ($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        $product = Product::find($productId);
        session()->flash('success', 'Товар ' . $product->name . ' доданий до кошика');

        return redirect()->route('basket', ['productId' => $productId, 'product' => $product]);
    }



    public function basketRemove($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);

        if ($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
                if ($pivotRow->count < 2){
                    $order->products()->detach($productId);
                } else {
                    $pivotRow->count--;
                    $pivotRow->update();
                }

        }

        return redirect()->route('basket');
    }


}
