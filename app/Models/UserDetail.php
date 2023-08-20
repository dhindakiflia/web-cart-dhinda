<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_detail';
    public $timestamp = true;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'status'
    ];

    public function user() : BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
