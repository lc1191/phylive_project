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

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $rules =
        [
            'street' => "required|min:3",
            'city' => "required|min:3",
            'province' => "required",
            'zip' => "required|min:6",
            'phone' => "min:9",
            'pay' => "required",
            'card_number' => "min:16|max:16",
            'card_ex_month' => "min:2|max:2",
            'card_ex_year' => "min:2|max:2",
            'card_ccv' => "min:3|max:3",
            'card_title' => "min:8"
        ];
}
