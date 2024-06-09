<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CartDetail extends Model
{
    protected $table = 'cart_details'; // Nama tabel di database

    protected $primaryKey = 'uuid'; // Nama kolom primary key
    public $incrementing = false; // Non-aktifkan auto-increment
    protected $keyType = 'string'; // Tipe data primary key

    protected $fillable = ['uuid', 'productId', 'cartId', 'qty', 'subTotal'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'ItemId');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartId', 'uuid');
    }
}
