<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['notedate', 'category_id', 'name', 'price', 'qty', 'amount', 'totalprice', 'image', 'status', 'description'];


    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');  //belongsToMany relationship with Category model
    }

    public function product_gallary()
    {
        return $this->hasMany(ProductGallary::class, 'product_id', 'id');  //hasMany relationship with Product model
    }
}
