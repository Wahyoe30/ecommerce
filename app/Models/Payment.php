<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'amount',
        'method',
        'status',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}