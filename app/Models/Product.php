<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function setImageAttribute($image)
    {
        if (!empty($this->attributes['image'])){
            FileStorageService::remove($this->attributes['image']);
        }


        $this->attributes['image'] = FileStorageService::upload($image);
    }

    public function imageUrl(): Attribute
    {
        return new Attribute(
            get: fn() => Storage::url($this->attributes['image'])
        );
    }

}
