<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'start',
        'end'
    ];

    public static $rules = [
        'title'=>'required',
        'description'=>'required',
        'start'=>'required',
        'end'=>'required',
    ];
}
