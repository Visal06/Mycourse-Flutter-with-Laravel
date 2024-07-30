<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ "categoryid", "attributevalueid", "title", "images", "prices", "description" ];

    protected $appends = ["imageurl"];

    public function getImageurlAttribute(){
        return asset('storage/'. $this->images);
    }
    public function progallary()
    {
        return $this->hasMany(ProductGallary::class,"product_id","id");
    }
}
