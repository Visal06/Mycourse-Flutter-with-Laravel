<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['title', 'image', 'description'];
    protected $appends = ["imageurl"];

    public function getImageurlAttribute()
    {
        return asset('storage/' . $this->image);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
