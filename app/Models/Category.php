<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Mendefinisikan nama tabel yang sesuai dengan model
    protected $table = 'category';

    // Mendefinisikan kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'Category_Name',
    ];
}
