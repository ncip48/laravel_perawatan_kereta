<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checksheet extends Model
{
    use HasFactory;
    protected $table = 'checksheet';
    protected $fillable = [
        'id_kereta',
        'id_user',
        'date_time',
        'no_kereta',
        'tipe',
        'jam_engine',
        'is_so',
        'p',
        'car',
        'id_approve_assman',
        'id_approve_spv',
        'id_approve',
    ];
}
