<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Notifications\TelegramNotificationsChannelForAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

/**
 * CartService
 *
 * This class handles the operations related to the shopping cart.
 */
class CartService
{
    /**
     * Adds a product to the cart.
     *
     * @param Product $product The product to be added.
     * @param int $quantity The quantity of the product to be added.
     * @return \Illuminate\Http\RedirectResponse Redirect response to the index page.
     */
    public function addProductToCart(Product $product, $quantity)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'image' => $product->imageUrl,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->route('index')->with('status', "Товар $product->name добавлен в чек");
    }

    /**
     * Saves the user's checkout information to the database and sends a notification to the admin via Telegram.
     *
     * @param array $data The user's checkout information including name, phone, and product names.
     * @return array The contents of the user's cart before it is cleared.
     */
    public function checkoutProductToDb(array $data)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        $products = [];
        foreach ($cart as $productId => $item) {
            $product = Product::findOrFail($productId);
            $products[] = $product->name;
        }
        $data = [
            'name' => $data['name'],
            'phone' => $data['phone'],
            'productNames' => implode(', ', $products),
        ];
        Order::create($data);

        $notification = new TelegramNotificationsChannelForAdmin($data['name'], $data['phone'], implode(', ', $products));
        Notification::route('telegram', -671071682)->notify($notification);

        session()->forget('cart');

        return $cart;
    }

    /**
     * Calculates the total cost of items in the cart.
     *
     * @return float The total cost of items in the cart.
     */
    public function getTotal()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

}

