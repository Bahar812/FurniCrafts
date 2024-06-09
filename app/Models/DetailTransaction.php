<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transaction';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'productId',
        'transaksiId',
        'qty',
        'subTotal'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaksiId', 'uuid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'ItemId');
    }
}
