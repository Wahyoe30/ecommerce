<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'foto'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getFotoUrlAttribute()
    {
        return asset('storage/images/' . $this->foto);
    }

    public function favorites()
    {
        return $this->hasMany(MyFavorite::class, 'id_product');
    }

    // Metode untuk menghapus foto dari storage jika produk dihapus
    // public function deleteFoto()
    // {
    //     Storage::delete('public/images/' . $this->foto);
    // }
}


