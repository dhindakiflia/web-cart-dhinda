<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamp = true;
    protected $fillable = [
        'order_date',
        'discount',
        'total',
        'status',
        'id_user'
    ];

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
