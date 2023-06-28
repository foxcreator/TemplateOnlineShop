<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use function redirect;
use function session;
use function view;

class CartController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = $this->cartService->getTotal();

        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $this->cartService->addProductToCart($product, $request->quantity);

        return redirect()->back();
    }

    public function checkout(CreateOrderRequest $request)
    {
        $data = $request->all();
        $cartId = $this->cartService->checkoutProductToDb($data);

        return redirect()->route('index')->with('success', "Менеджер вже оброблює ваш заказ.");
    }

    public function remove(Request $request, Product $product)
    {
        $product->removeFromCart();

        return redirect()->back();
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('index')->with('status', 'Корзина успешно очищена');
    }


    public function check()
    {
        $cart = session()->get('cart', []);
        $total = $this->cartService->getTotal();
        return view('checkout', compact('total', 'cart'));
    }

}

