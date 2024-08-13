<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slice extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'slices';
    protected $fillable = ['image', 'description'];
    protected $appends = ["imageurl"];

    public function getImageurlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
