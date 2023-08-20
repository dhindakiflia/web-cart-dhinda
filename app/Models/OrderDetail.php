<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamp = true;
    protected $fillable = [
        'id_order',
        'id_product_type',
        'qty'
    ];

    public function order() : BelongsTo
    {
       return $this->belongsTo(Order::class);
    }
}
