<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_checksheet extends Model
{
    use HasFactory;
    protected $table = 'item_checksheet';
    protected $fillable = [
        'id_kategori_checksheet',
        'nama_item',
        'id_kereta',
        'standar',
        'harian',
        'p1',
        'p3',
        'p6',
        'p12',
        'car_index'
    ];
}
