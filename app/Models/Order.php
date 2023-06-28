<?php

namespace App\Models;

use App\Notifications\TelegramNotificationsChannelForAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'productNames'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function GetFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum +=$product->getPriceForCount();
        }
        return $sum;
    }

    private function getProductNames()
    {
        $productNames = [];
        foreach ($this->products as $product) {
            $productNames[] = $product->name;
        }
        return implode(', ', $productNames);
    }
}
