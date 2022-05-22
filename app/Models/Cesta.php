<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'user_name','product_id',
        'product_name',
        'quantity',
        'price',
        'total_price',
        'image',
        'street',
        'city','province',
        'zip',
        'phone',
        'pay','card_number',
        'card_ex_month',
        'card_ex_year',
        'card_ccv',
        'card_title'
    ];

}
