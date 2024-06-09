<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping'; // Nama tabel di database

    protected $primaryKey = 'uuid'; // Nama kolom primary key
    public $incrementing = false; // Non-aktifkan auto-increment
    protected $keyType = 'string'; // Tipe data primary key

    protected $fillable = [
        'uuid', 'user_id', 'alamat', 'kota', 'provinsi', 'negara', 'kode_pos', 'nomor_telepon', 'status'
    ];


    /**
     * Get the user that owns the shipping.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }
}
