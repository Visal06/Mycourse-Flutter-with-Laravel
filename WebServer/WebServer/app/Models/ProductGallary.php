<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallary extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ "product_id", "images" ];
    protected $visible = ["id","images", "gallryurl"];

    protected $appends = ["gallryurl"];

     public function getGallryUrlAttribute(){
        return asset('storage/'. $this->images);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,"product_id","id");
    }

}
