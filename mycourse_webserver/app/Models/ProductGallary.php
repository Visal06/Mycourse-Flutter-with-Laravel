<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallary extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_gallaries';
    protected $fillable = ['product_id', 'image'];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');  //belongsTo relationship with Product model
    }
}
