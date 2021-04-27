<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class helpme_module extends Model
{
    use HasFactory;

    protected $table = "helpme_module";

    protected $fillable = ['menu_id','belongs_to','product_id','screen','title','status'];
}
