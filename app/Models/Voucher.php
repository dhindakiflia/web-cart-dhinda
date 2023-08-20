<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    public $timestamp = true;
    protected $fillable = [
        'voucher_code',
        'date',
        'discount',
        'status'
    ];
}
