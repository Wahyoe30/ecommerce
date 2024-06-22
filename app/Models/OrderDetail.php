<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'id_order',
        'quantity',
        'price',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
    // public function product()
    // {
    //     return $this->belongsTo(Products::class);
    // }



}
