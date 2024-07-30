<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Side extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [ "slideurl", "orderitem" ];

    protected $appends = ["imageurl"];

    public function getImageurlAttribute(){
        return asset('storage/'. $this->slideurl);
    }
}
