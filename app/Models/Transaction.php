<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'tanggal',
        'waktu',
        'statusPembayaran',
        'total',
        'tipePembayaran',
        'shippingId'
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

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shippingId', 'uuid');
    }

    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class, 'transaksiId', 'uuid');
    }
}
