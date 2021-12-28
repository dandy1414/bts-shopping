<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shoppings';

    protected $fillable = [
        'created_date',
        'name',
    ];

    public $timestamps = false;


}
