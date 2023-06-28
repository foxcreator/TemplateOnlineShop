<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Product
 *
 * This class represents a product in the system.
 * It extends the Model class and uses the HasFactory trait.
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'description',
        'image',
        'price'
    ];

    /**
     * Get the category that the item belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the price for a certain count of items.
     *
     * @return int The calculated price.
     */
    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    /**
     * Remove an item from the cart
     *
     * This method is used to remove an item from the cart by decreasing its quantity by 1.
     * If the quantity reaches 0, the item is removed from the cart completely.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromCart()
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$this->id]['quantity'])) {
            return redirect()->back()->with('error', 'Товар не найден в чеке');
        }

        if ($cart[$this->id]['quantity'] > 1) {
            $cart[$this->id]['quantity']--;
        } else {
            unset($cart[$this->id]);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('status', "$this->name удален из чека");
    }

    /**
     * Set the value of the image attribute.
     *
     * @param mixed $image The image to be set.
     * @return void
     */
    public function setImageAttribute($image)
    {
        if (!empty($this->attributes['image'])){
            FileStorageService::remove($this->attributes['image']);
        }


        $this->attributes['image'] = FileStorageService::upload($image);
    }

    /**
     * Get the URL of the image attribute.
     *
     * @return Attribute An Attribute object representing the URL of the image.
     */
    public function imageUrl(): Attribute
    {
        return new Attribute(
            get: fn() => Storage::url($this->attributes['image'])
        );
    }

}
