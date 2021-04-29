<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_options extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id','product_id'];
}
