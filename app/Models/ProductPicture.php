<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    use HasFactory;
    protected $table = 'product_pict';
    public $timestamp = true;
    protected $fillable = [
        'name',
        'id_product'
    ];
}
