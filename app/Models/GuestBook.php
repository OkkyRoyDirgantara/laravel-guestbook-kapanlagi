<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    protected $fillable = ['first_name', 'last_name', 'body', 'organization', 'address', 'province', 'city', 'email'];
    use HasFactory;
}
