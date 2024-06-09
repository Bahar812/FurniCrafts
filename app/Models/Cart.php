<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    protected $table = 'cart'; // Nama tabel di database

    protected $primaryKey = 'uuid'; // Nama kolom primary key
    public $incrementing = false; // Non-aktifkan auto-increment
    protected $keyType = 'string'; // Tipe data primary key

    protected $fillable = ['uuid', 'tanggal', 'waktu', 'total', 'userId'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class, 'cartId', 'uuid');
    }
}
