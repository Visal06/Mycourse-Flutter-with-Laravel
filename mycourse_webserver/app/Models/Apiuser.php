<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Apiuser extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'apiusers';
    protected $fillable = ['name', 'email', 'email_verified_at', 'password'];
    protected $hidden = ['password', 'remember_token'];
}
