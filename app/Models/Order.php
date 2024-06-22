<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id_order';
    protected $table = 'orders';
    protected $fillable = [
        'id_user',
        'total_amount',
        'status',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan OrderDetail atau model lainnya jika diperlukan
    protected $guarded = [];
    public function orderdetail()
    {
        return $this->hasOne(OrderDetail::class, 'id_order');
    }

    public function product()
    {
        return $this->hasMany(Products::class);
    }


}
