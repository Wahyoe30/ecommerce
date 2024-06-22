<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myfavorite extends Model
{
    use HasFactory;

    protected $table = 'myfavorites';
    protected $fillable = [
        'id_user',
        'id_product'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'id_product');
    }

}

