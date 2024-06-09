<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang sesuai dengan model
    protected $table = 'product';

    // Mendefinisikan kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'Nama_Product',
        'Price',
        'ItemId',
        'Img_Detail_1',
        'Img_Detail_2',
        'Img_Detail_3',
        'Description',
        'Stock',
        'CategoryID',
    ];

    // Mendefinisikan tipe data kolom
    protected $casts = [
        'Price' => 'decimal:2', // Price akan di-cast menjadi decimal dengan 2 digit di belakang koma
    ];

    // Mendefinisikan bahwa ItemId adalah primary key dan merupakan UUID
    protected $primaryKey = 'ItemId';
    public $incrementing = false;
    protected $keyType = 'string';

    // Relationship dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }
}
